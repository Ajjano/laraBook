@extends('layouts.master')
@section('edit_content')
<div class="col-md-6 content">
    {!! Form::open([
    'route'=>['topics.update', $topic_id->id],
    'method'=>'put',
    ]) !!}

    <div class="form-group">
        <label for="name">Name of topic</label>
        <input type="text" value="{{$topic_id->name}}" name="name"  class="form-control" placeholder="enter name">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{route('topics.index')}}" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
    </div>
    {!! Form::close() !!}
</div>
<div class="col-md-6">
    @include('errors')
    @include('_message')
</div>
    @endsection