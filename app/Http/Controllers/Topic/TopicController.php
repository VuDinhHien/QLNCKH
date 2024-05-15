<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Lvtopic;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lvtopics = Lvtopic::orderBy('lvtopic_name', 'ASC')->select('id', 'lvtopic_name')->get();
        $topics = Topic::all();
        return view('topic.index', compact('lvtopics', 'topics'));
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
            'teacher_name'   =>  'required',
            'result'         =>  'required',
            'end_date'       =>  'required',
            'lvtopic_id'     =>  'required|exists:lvtopics,id',
        ]);


        Topic::create($request->all());

        return redirect()->route('topic.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $id)
    {
        //
        $topic = Topic::findOrFail($id);
        $lvtopic = Lvtopic::orderBy('lvtopic_name', 'ASC')->select('id', 'lvtopic_name')->get();
        return view('topic.edit', compact('topic', 'lvtopic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //

        // Validate the request data
        // Validate the request data
        $validatedData = $request->validate([
            'topic_name' => 'required',
            'teacher_name' => 'required',
            'result' => 'required',
            'end_date' => 'required',
            'lvtopic_id' => 'required|exists:lvtopics,id',
        ]);

        // Find the topic by its ID
        $topic = Topic::findOrFail($id);

        // Update the topic with the validated data
        $topic->update($validatedData);

        // Redirect back to the index page
        return redirect()->route('topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic, $id)
    {
        //
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topic.index');
    }
}
