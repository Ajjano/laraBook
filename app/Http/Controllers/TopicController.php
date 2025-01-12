<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $topics=Topic::all();
       return view('topic.index',[
           'topics'=>$topics,
           'page'=>'topics'
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.create',[
            'page'=>'topic'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'=>'required|unique:topics',
        ]);
        $topic=Topic::add($request->all());
        return redirect()->route('topics.index')
            ->with('message', 'Luck');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic_id=Topic::find($id);
        return view('topic.edit',['topic_id'=>$topic_id, 'page'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|unique:topics',
        ]);
        $topic = Topic::find($id);
        $topic->edit($request->all());/*
        $topic->name = $request->get('name');
        $topic->save();*/
        return redirect()->route('topics.index')
            ->with('message', 'Changes are successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::find($id)->delete();
        return redirect()->route('topics.index')
            ->with('message', 'Delete');
    }
}
