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
        //
        $scientists = Scientist::orderBy('profile_name', 'ASC')->select('id', 'profile_name')->get();
        $roles = Role::orderBy('role_name', 'ASC')->select('id', 'role_name')->get();
        $lvtopics = Lvtopic::orderBy('lvtopic_name', 'ASC')->select('id', 'lvtopic_name')->get();
        
        $topics = Topic::paginate(100);
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
        $request->validate([
            'topic_name'     =>  'required',
            'profile_id'     =>  'required|exists:scientists,id',
            'role_id'     =>  'required|exists:roles,id',
            'result'         =>  'required',
            'start_date'       =>  'required',
            'end_date'       =>  'required',
            'lvtopic_id'     =>  'required|exists:lvtopics,id',
        ]);


        Topic::create($request->all());

        return redirect()->route('topic.index');
    }


    /**
     * Display the specified resource.
     */

     public function showTopicsByScientist(Scientist $scientist)
     {
         $topics = $scientist->topics()->paginate(10);
         return view('topic.scientist_topics', compact('topics', 'scientist'));
     }
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $id)
    {
        //
        //
        $topic = Topic::findOrFail($id);
        $lvtopics = Lvtopic::orderBy('lvtopic_name', 'ASC')->select('id', 'lvtopic_name')->get();
        $scientists = Scientist::orderBy('profile_name', 'ASC')->select('id', 'profile_name')->get();
        $roles = Role::orderBy('role_name', 'ASC')->select('id', 'role_name')->get();
        return view('topic.index', compact('topic', 'lvtopics', 'scientists','roles'));


        /**
         * Update the specified resource in storage.
         */
    }
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'topic_name'     =>  'required',
            'profile_id'     =>  'required|exists:scientists,id',
            'result'         =>  'required',
            'start_date'     =>  'required',
            'end_date'       =>  'required',
            'lvtopic_id'     =>  'required|exists:lvtopics,id',

        ]);

        $topic = Topic::findOrFail($id);
        $topic->update($validatedData);

        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topic.index');
    }

    public function export() 
    {
        return Excel::download(new TopicsExport, 'topics.xlsx');
    }
}
