@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="row">
           <div class="col-md-1">
                   <ul class="nav-pills nav-stacked ul1">
                       <li><a name="all" {{$cat_page=='all'?'class=active':''}} href="/">All</a></li>
                       @foreach($topics as $topic)
                       <li><a {{$cat_page==$topic->id?'class=active':''}} name="{{$topic->name}}" href="{{route('index_cats', ['category'=>$topic->id])}}">{{$topic->name}}</a></li>
                       @endforeach
                           {{--{{$category==$topic->name?'class=active':''}}--}}
                   </ul>
           </div>
            <div class="col-md-11">
                @foreach($blocks as $block)
                    <div class="col-md-4 content_block">
                        <h2>{{$block->title}}</h2>
                        <img src="/uploads/{{$block->image_path}}" class="pict_block" alt="pict">
                        <span>{{$block->content}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection