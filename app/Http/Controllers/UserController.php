<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Scientist;
use App\Models\Topic;
use App\Models\Degree;
use App\Models\Lvtopic;
use App\Models\Magazine;
use App\Models\Office;
use App\Models\Paper;
use App\Models\Role;
use App\Models\Training;
use App\Models\Offer;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user's name matches any scientist's name
            $scientist = Scientist::where('name', $user->name)->first();

            if ($scientist) {
                // If there is a scientist with the same name, continue to dashboard
                return redirect()->route('user.dashboard')->with('ok', 'Đăng nhập thành công');
            } else {
                // If there is no scientist with the same name, logout and show error
                Auth::logout();
                return redirect()->route('login')->with('no', 'Bạn không có quyền truy cập trang này');
            }
        }

        return redirect()->route('login')->with('no', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('no', 'Đăng xuất thành công');
    }

    public function index()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();

        if ($scientist) {
            return view('user.profile.show', compact('scientist'));
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function editProfile()
    {
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();
        $degrees = Degree::all();
        $offices = Office::all(); // Lấy tất cả các bằng cấp

        if ($scientist) {
            return view('user.profile.update', compact('scientist', 'degrees', 'offices'));
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|string|max:255',
            'profile_name' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'birth_place' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'degree_id' => 'required|exists:degrees,id',
            'research_major' => 'nullable',
            'office_id' => 'required|exists:offices,id',
            'address_office' => 'required',
        ]);

        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();

        if ($scientist) {
            $scientist->update($request->only('profile_id', 'profile_name', 'birthday', 'gender', 'birth_place', 'telephone', 'email', 'degree_id', 'research_major', 'office_id', 'address_office'));
            return redirect()->route('user.profile.show')->with('ok', 'Cập nhật thông tin thành công');
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function projects()
    {
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();

        if ($scientist) {
            $topics = $scientist->topics()->with(['lvtopic', 'scientists' => function ($query) {
                $query->withPivot('role_id');
            }])->get();
            $lvtopics = Lvtopic::all();
            $roles = Role::all();
            $scientists = Scientist::all();

            return view('user.projects.index', compact('topics', 'scientist', 'scientists', 'lvtopics', 'roles'));
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function storeProject(Request $request)
   {
    // Log dữ liệu request để kiểm tra
   

    $request->validate([
        'topic_name' => 'required|string|max:255',
        'lvtopic_id' => 'required|exists:lvtopics,id',
        'result' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'scientists.*.id' => 'required|exists:scientists,id',
        'scientists.*.role_id' => 'required|exists:roles,id',
        'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Kiểm tra file upload
    ]);

   

    $topic = new Topic();
    $topic->topic_name = $request->input('topic_name');
    $topic->lvtopic_id = $request->input('lvtopic_id');
    $topic->result = $request->input('result');
    $topic->start_date = $request->input('start_date');
    $topic->end_date = $request->input('end_date');

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $originalFileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/topics', $originalFileName, 'public');
        $topic->file = $originalFileName; // Lưu đường dẫn đầy đủ vào cơ sở dữ liệu
    }

    

    $topic->save();


    foreach ($request->input('scientists') as $scientist) {
        $topic->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
    }



    return redirect()->back()->with('success', 'Đề tài mới đã được thêm thành công!');
  }


    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'topic_name' => 'required|string|max:255',
            'lvtopic_id' => 'required|exists:lvtopics,id',
            'result' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'role_id' => 'required|exists:roles,id',
            'file' => 'nullable|mimes:doc,docx,pdf|max:2048', // Kiểm tra định dạng và kích thước file
        ]);

        // Xử lý file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName(); // Lấy tên gốc của tệp
            $file->move(public_path('uploads/topics'), $filename);
            $topic->file = $filename;
        }



        $topic->update([
            'topic_name' => $request->topic_name,
            'lvtopic_id' => $request->lvtopic_id,
            'result' => $request->result,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Cập nhật vai trò của người dùng trong đề tài
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();
        $topic->scientists()->updateExistingPivot($scientist->id, ['role_id' => $request->role_id]);

        return redirect()->route('user.projects.index')->with('success', 'Đề tài đã được cập nhật thành công.');
    }

    public function destroyProject(Topic $topic)
    {
        $topic->delete();
        return redirect()->back()->with('success', 'Đề tài đã được xóa thành công!');
    }

    public function magazines()
    {
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();

        if ($scientist) {
            $magazines = $scientist->magazines()->with(['paper', 'scientists' => function ($query) {
                $query->withPivot('role_id');
            }])->get();
            $papers = Paper::all();
            $roles = Role::all();
            $scientists = Scientist::all();

            return view('user.magazines.index', compact('magazines', 'scientist', 'scientists', 'papers', 'roles'));
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function storeMagazine(Request $request)
    {
        $request->validate([
            'magazine_name' => 'required|string|max:255',
            'year' => 'required|integer',
            'journal' => 'required|string|max:255',
            'paper_id' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Kiểm tra file upload
        ]);

        $magazine = new Magazine();
        $magazine->magazine_name = $request->input('magazine_name');
        $magazine->year = $request->input('year');
        $magazine->journal = $request->input('journal');
        $magazine->paper_id = $request->input('paper_id');

        // Xử lý file upload nếu có
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/magazines', $originalFileName, 'public');
            $magazine->file_path = $originalFileName; // Lưu tên file vào cơ sở dữ liệu
        }
        $magazine->save();

        foreach ($request->input('scientists') as $scientist) {
            $magazine->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->back()->with('success', 'Bài báo mới đã được thêm thành công!');
    }
    public function updateMagazine(Request $request, Magazine $magazine)
    {
        $request->validate([
            'magazine_name' => 'required|string|max:255',
            'year' => 'required|string',
            'journal' => 'required|string',
            'paper_id' => 'required|exists:papers,id',
            'role_id' => 'required|exists:roles,id',
            'file' => 'nullable|mimes:doc,docx,pdf|max:2048', // Kiểm tra định dạng và kích thước file
        ]);

        // Xử lý file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName(); // Lấy tên gốc của tệp
            $file->move(public_path('uploads/magazines'), $filename);
            $magazine->file_path = $filename;
        }

        $magazine->update([
            'magazine_name' => $request->magazine_name,
            'year' => $request->year,
            'journal' => $request->journal,
            'paper_id' => $request->paper_id,
        ]);

        // Cập nhật vai trò của người dùng trong bài báo
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();
        $magazine->scientists()->updateExistingPivot($scientist->id, ['role_id' => $request->role_id]);

        return redirect()->route('user.magazines.index')->with('success', 'Bài báo đã được cập nhật thành công.');
    }

    public function destroyMagazine(Magazine $magazine)
    {
        $magazine->delete();
        return redirect()->back()->with('success', 'Đề tài đã được xóa thành công!');
    }

    public function curriculums()
    {
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();

        if ($scientist) {
            $curriculums = $scientist->curriculums()->with(['training', 'scientists' => function ($query) {
                $query->withPivot('role_id');
            }])->get();
            $trainings = Training::all();
            $roles = Role::all();
            $books = Book::all();
            $scientists = Scientist::all();

            return view('user.curriculums.index', compact('curriculums', 'scientist', 'scientists', 'trainings', 'roles', 'books'));
        } else {
            return redirect()->route('user.dashboard')->with('no', 'Không tìm thấy thông tin nhà khoa học');
        }
    }

    public function storeCurriculum(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string',
            'year' => 'required|integer',
            'publisher' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'training_id' => 'required|exists:trainings,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Kiểm tra file upload
        ]);

        $curriculum = new Curriculum();
        $curriculum->name = $request->input('name');
        $curriculum->year = $request->input('year');
        $curriculum->publisher = $request->input('publisher');
        $curriculum->book_id = $request->input('book_id');
        $curriculum->training_id = $request->input('training_id');

        // Xử lý file upload nếu có
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalFileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/curriculums', $originalFileName, 'public');
            $curriculum->file = $originalFileName; // Lưu tên file vào cơ sở dữ liệu
        }

        $curriculum->save();

        foreach ($request->input('scientists') as $scientist) {
            $curriculum->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->back()->with('success', 'Bài báo mới đã được thêm thành công!');
    }

    public function updateCurriculum(Request $request, Curriculum $curriculum)
    {
        $request->validate([
            'name' => 'required|string',
            'year' => 'required',
            'publisher' => 'required|string',
            'book_id' => 'required|exists:books,id',
            'training_id' => 'required|exists:trainings,id',
            'role_id' => 'required|exists:roles,id',
            'file' => 'nullable|mimes:doc,docx,pdf|max:2048', // Kiểm tra định dạng và kích thước file
        ]);

        // Xử lý file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName(); // Lấy tên gốc của tệp
            $file->move(public_path('uploads/curriculums'), $filename);
            $curriculum->file = $filename;
        }

        $curriculum->update([
            'name' => $request->name,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'journal' => $request->journal,
            'book_id' => $request->book_id,
            'training_id' => $request->training_id,


        ]);
        // Cập nhật vai trò của người dùng trong bài báo
        $user = Auth::user();
        $scientist = Scientist::where('profile_name', $user->name)->first();
        $curriculum->scientists()->updateExistingPivot($scientist->id, ['role_id' => $request->role_id]);

        return redirect()->route('user.curriculums.index')->with('success', 'Bài báo đã được cập nhật thành công.');
    }

    public function destroyCurriculum(Curriculum $curriculum)
    {
        $curriculum->delete();
        return redirect()->back()->with('success', 'giáo trình/sách tham khảo đã được xóa thành công!');
    }

    public function offers()
    {
        // Lấy tất cả các đề xuất của user hiện tại
        $offers = Offer::where('user_id', Auth::id())->get();
        $papers = Paper::all();
        $roles = Role::all();
        $scientists = Scientist::all();

        return view('user.offers.index', compact('offers'));
        
            
    }

    public function storeOffer(Request $request)
    {
        $request->validate([
            'proposer' => 'required|string|max:255',
            'year' => 'required|integer',
            'offer_name' => 'required|string|max:255',
            'propose_id' => 'required|exists:proposes,id',
            'suggestion_id' => 'required|exists:suggestions,id',
            'note' => 'nullable|string',
        ]);

        Offer::create([
            'proposer' => $request->proposer,
            'year' => $request->year,
            'offer_name' => $request->offer_name,
            'propose_id' => $request->propose_id,
            'suggestion_id' => $request->suggestion_id,
            'note' => $request->note,
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('offers.index')->with('success', 'Đề xuất đã được thêm!');
    }
}
