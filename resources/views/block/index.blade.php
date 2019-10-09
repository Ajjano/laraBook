@extends('layouts.master')
@section('content')
    <div class="col-md-8 content">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Topic name</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blocks as $block)
                    <tr>
                        <td>{{$block->id}}</td>
                        {{--<td>{{$block->topic()->where()->name}}</td>--}}
                        <td>{{$block->topic->name}}</td>
                        <td>{{$block->title}}</td>
                        <td>{{$block->content}}</td>
                        <td>
                            <img src="{{$block->getImage()}}" alt="pict" class="img-responsive">
                        </td>
                        <td class="option">
                            <a href="{{route('blocks.edit', $block->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                            {!! Form::open([
                            'route'=>['blocks.destroy',$block->id],
                            'method'=>'delete'
                            ]) !!}
                            <button type="submit" class="btn_remove btn glyphicon glyphicon-remove"></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <a href="{{route('blocks.create')}}" class="btn btn-success">Add</a>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4">
        @include('_message')
    </div>
@endsection