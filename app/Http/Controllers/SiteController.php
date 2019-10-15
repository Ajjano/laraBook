<?php

namespace App\Http\Controllers;

use App\Block;
use App\Topic;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index(){
        $blocks=Block::all();
        $topics=Topic::all();
        return view('site.index',[
            'page'=>'main',
            'cat_page'=>'all',
            'blocks'=>$blocks,
            'topics'=>$topics,
        ]);

    }

    public function index_category($category_id){
        $blocks=Block::where('topic_id','=', $category_id)->get();
        $topics=Topic::all();
//      dd($blocks);
        return view('site.index',[
            'page'=>'main',
            'cat_page'=>$category_id,
            'blocks'=>$blocks,
            'topics'=>$topics,
        ]);
//
    }
}
