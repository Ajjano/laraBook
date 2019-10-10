<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('block.index',[
           'blocks'=>Block::all(),
           'page'=>'block',
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics=Topic::all();
        return view('block.create', ['page'=>'blocks',
            'topics'=>$topics,
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
       $this->validate($request,[
           'title'=>'required|max:300',
           'content'=>'required',
           'image_path'=>'nullable|image',
       ]);

       $block = Block::add($request->all());
       $block->uploadImage($request->file('image_path'));
       return redirect()->route('blocks.index')->with('message','Block was added successfully');
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
        $topic=Topic::all();
        $block_id=Block::find($id);
        return view('block.edit',[
            'block_id'=>$block_id,
            'topics'=>$topic,
            'page'=>'edit',
        ]);
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
        $this->validate($request,[
            'title'=>'required|max:300',
            'content'=>'required',
            'image_path'=>'nullable|image',
        ]);

        $block=Block::find($id);
        $block->edit($request->all());
        return redirect()->route('blocks.index')->with('message', 'Changes are successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Block::find($id)->remove();
        return redirect()->route('blocks.index')->with('message','Delete');
    }
}
