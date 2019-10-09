@extends('layouts.master')
@section('content')
    <div class="col-md-6 content">
        {!! Form::open([
        'route'=>'blocks.store',
        'method'=>'post',
        ]) !!}

        <div class="form-group">
            <label for="topic_id">Chose a theme:</label>
            <select  name="topic_id" class="form-control" >
                @foreach($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{old('title')}}" name="title"  class="form-control" placeholder="enter title">
        </div>
        <div class="form-group">
            <label for="name">Content</label>
            <textarea  value="{{old('content')}}" name="content"  class="form-control" placeholder="enter name"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" value="{{old('name')}}" name="name"  class="form-control" placeholder="enter name">
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