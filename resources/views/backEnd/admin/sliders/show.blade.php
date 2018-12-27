@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'slider', 'action' => $actions['show']] )
@stop

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg_white">
            <tr>
                <th>Title</th>
                <td> {{ $slider->title }} </td>
            </tr>

            <tr>
                <th>Image</th>
                <td> <img src="{{ asset('/upload/slider/' . $slider->image)}}" alt="{{ $slider->title }}" width="250" height="250"> </td>
            </tr> 

            <tr>
                <th>In slider</th>
                <td> {{($slider->inSlide == 1) ? 'YES' : 'NO'}} </td>
            </tr>

            <tr>
                <th>Link</th>
                <td> <a href="{{ $slider->link }}">{{ $slider->link }}</a> </td>
            </tr>

            <tr>
                <th>Last update</th>
                <td> {{ $slider->updated_at }} </td>
            </tr>
        </table>
    </div>

@endsection