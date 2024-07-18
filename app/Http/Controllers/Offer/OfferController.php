<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Scientist;
use App\Models\Propose;
use App\Models\Role;
use App\Models\Topic;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách các đề xuất chưa được duyệt
        $offers = Offer::with(['scientists', 'scientists.offers', 'propose'])
            ->where('status', '!=', 'approved')
            ->paginate(100);

        $scientists = Scientist::all();
        $roles = Role::all();
        $proposes = Propose::all();

        return view('offer.index', compact('offers', 'scientists', 'roles', 'proposes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'offer_name'     =>  'required',
            'year'           =>  'required',
            'propose_id'     =>  'required|exists:proposes,id',
            'scientists'     =>  'required|array',
            'scientists.*.id'       =>  'required|exists:scientists,id',
            'scientists.*.role_id'  =>  'required|exists:roles,id',
        ]);

        $offer = Offer::create([
            'offer_name'  => $validatedData['offer_name'],
            'year'        => $validatedData['year'],
            'status'      => 'chờ duyệt', // Giá trị mặc định cho status
            'propose_id'  => $validatedData['propose_id'],
            // Các trường khác nếu có
        ]);

        foreach ($validatedData['scientists'] as $scientist) {
            $offer->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->route('offer.index')->with('success', 'Thêm đề xuất thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'offer_name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),

            'propose_id'     =>  'required|exists:proposes,id',

            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        // Find the curriculum by ID
        $offer = Offer::findOrFail($id);

        // Update the curriculum with validated data
        $offer->update([
            'offer_name'  => $validatedData['offer_name'],
            'year'        => $validatedData['year'],
            'status'      => 'chờ duyệt', // Giá trị mặc định cho status
            'propose_id'  => $validatedData['propose_id'],
        ]);


        $scientistsSyncData = [];
        foreach ($validatedData['scientists'] as $scientist) {
            $scientistsSyncData[$scientist['id']] = ['role_id' => $scientist['role_id']];
        }
        $offer->scientists()->sync($scientistsSyncData);

        // Redirect with a success message
        return redirect()->route('offer.index')->with('success', 'Cập nhật đề xuất thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('offer.index')->with('success', 'Xóa đề xuất thành công.');
    }

    public function approve(Offer $offer)
    {
        // Tạo topic từ offer
        $topic = Topic::create([
            'topic_name' => $offer->offer_name,
            'lvtopic_id' => $offer->propose_id,
            'result' => 'Chưa nghiệm thu',  // Đặt giá trị null cho result
            'start_date' => now(),  // Bạn có thể điều chỉnh ngày bắt đầu tùy theo logic của bạn
            'end_date' => now()->addMonths(6),  // Bạn có thể điều chỉnh ngày kết thúc tùy theo logic của bạn
        ]);

        // Sao chép các nhà khoa học và vai trò từ offer sang topic
        $scientistsWithRoles = $offer->scientists()->withPivot('role_id')->get();
        foreach ($scientistsWithRoles as $scientist) {
            $topic->scientists()->attach($scientist->id, ['role_id' => $scientist->pivot->role_id]);
        }

        // Cập nhật status của offer
        $offer->update(['status' => 'đã duyệt']);

        return redirect()->back()->with('success', 'Đề xuất đã được duyệt và chuyển vào danh sách đề tài.');
    }
}
