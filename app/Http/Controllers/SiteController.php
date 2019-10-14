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
            'blocks'=>$blocks,
            'topics'=>$topics,
        ]);

    }

}
