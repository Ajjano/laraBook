@extends('layouts.master')
@section('content')
    <div class="col-md-6 content">
        {!! Form::open([
        'route'=>['blocks.update',$block_id->id],
        'method'=>'put',
        'files'=>true,
        ]) !!}

        <div class="form-group">
            <label for="topic_id">Chose a theme:</label>
            <select  name="topic_id" class="form-control" >
                @foreach($topics as $topic)
                    <option @if($block_id->topics_id==$topic->id)selected @endif value="{{$topic->id}}">{{$topic->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$block_id->title}}" name="title"  class="form-control" placeholder="enter title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content"  rows="3" class="form-control">{{$block_id->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Current Image</label>
            <img src="{{$block_id->getImage()}}" alt="pict" class="img-responsive">
        </div>
        <div class="form-group">
            <label for="image_path">Image</label>
            <input type="file"  name="image_path"  class="form-control" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('blocks.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        @include('errors')
        @include('_message')
    </div>
@endsection