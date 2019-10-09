@extends('layouts.master')
@section('content')
    <div class="col-md-6 content">
        {!! Form::open([
        'route'=>'topics.store',
        'method'=>'post',
        ]) !!}

        <div class="form-group">
            <label for="name">Name of topic</label>
            <input type="text" value="{{old('name')}}" name="name"  class="form-control" placeholder="enter name">
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