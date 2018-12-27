@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'post','action' => $actions['show']] )
@stop

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg_white">
            <tr>
                <th>Title</th>
                <td> {{ $post->title }} </td>
            </tr>

            <tr>
                <th>User</th>
                <td> {{ $post->user->name }} </td>
            </tr>

            <tr>  
                <th>Category</th>              
                <td> {{ $post->category->category_name }} </td>
            </tr> 

            <tr>
                <th>Image</th>
                <td> <img src="{{ asset('/upload/post/' . $post->image)}}" alt="{{ $post->title }}" width="250"> </td>
            </tr> 

            <tr>
                <th>Description</th>
                <td> {{ $post->description }} </td>
            </tr>

            <tr>
                <th>Last update</th>
                <td> {{ $post->updated_at }} </td>
            </tr>
        </table>
    </div>

@endsection