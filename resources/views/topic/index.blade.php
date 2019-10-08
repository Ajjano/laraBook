@extends('layouts.master')
@section('content')
    <div class="col-md-8 content">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>option</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{$topic->id}}</td>
                        <td>{{$topic->name}}</td>
                        <td>{{$topic->created_at}}</td>
                        <td>{{$topic->updated_at}}</td>
                        <td class="option">
                            <a href="{{route('topics.edit', $topic->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                            {!! Form::open([
                            'route'=>['topics.destroy',$topic->id],
                            'method'=>'delete'
                            ]) !!}
                            <button type="submit" class="btn_remove btn glyphicon glyphicon-remove"></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <a href="{{route('topics.create')}}" class="btn btn-success">Add</a>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4">
        @include('_message')
    </div>
@endsection