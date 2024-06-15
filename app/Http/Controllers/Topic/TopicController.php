<?php

namespace App\Http\Controllers\Topic;

use App\Exports\TopicsExport;
use App\Http\Controllers\Controller;


use Maatwebsite\Excel\Facades\Excel;

use App\Models\Lvtopic;
use App\Models\Role;
use App\Models\Topic;
use App\Models\Scientist;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $topics = Topic::with(['scientists', 'scientists.topics', 'lvtopic'])->paginate(100);
        $scientists = Scientist::all();
        $roles = Role::all();
        $lvtopics = Lvtopic::all();
        return view('topic.index', compact('lvtopics', 'topics', 'scientists','roles'));
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

    //
    public function store(Request $request)
    {
    

        $validatedData = $request->validate([
            'topic_name' => 'required|string|max:255',
            'lvtopic_id'     =>  'required|exists:lvtopics,id',
            'result'         =>  'required',
            'start_date'       =>  'required',
            'end_date'       =>  'required',
            
            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        $topic = Topic::create([
            'topic_name' => $validatedData['topic_name'],
            'result' => $validatedData['result'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'lvtopic_id' => $validatedData['lvtopic_id'],
        ]);

        foreach ($validatedData['scientists'] as $scientist) {
            $topic->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->route('topic.index')->with('success', 'Thêm đề tài thành công');
    }


    /**
     * Display the specified resource.
     */

     public function showTopicsByScientist(Scientist $scientist)
     {
        $topics = $scientist->topics()->with(['scientists'])->paginate(10);
         return view('topic.scientist_topics', compact('topics', 'scientist'));
     }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $id)
    {
        
      
    }
    public function update(Request $request, $id)
    {
     
        $validatedData = $request->validate([
           'topic_name' => 'required|string|max:255',
            'result'         =>  'required',
            'start_date'       =>  'required',
            'end_date'       =>  'required',
            'lvtopic_id'     =>  'required|exists:lvtopics,id',
            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update([
            'topic_name' => $validatedData['topic_name'],
            'result' => $validatedData['result'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'lvtopic_id' => $validatedData['lvtopic_id'],
        ]);

        $topic->scientists()->detach();
        foreach ($validatedData['scientists'] as $scientist) {
            $topic->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->route('topic.index')->with('success', 'Cập nhật đề tài thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topic.index')->with('success', 'Xóa đề tài thành công');
    }

    public function export() 
    {
        return Excel::download(new TopicsExport, 'topics.xlsx');
    }
}
