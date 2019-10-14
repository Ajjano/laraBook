@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="row">
           <div class="col-md-1">
                   <ul class="nav nav-pills nav-stacked">
                       @foreach($topics as $topic)
                       <li><a href="#">{{$topic->name}}</a></li>
                       @endforeach
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