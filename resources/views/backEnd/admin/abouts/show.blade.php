@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'about','action' => $actions['show']] )
@stop

@section('content')



    <div class="table-responsive">
        <table class="table table-bordered table-striped bg_white">
            <tr>
                <th>Title</th>
                <td> {{ $about->title }} </td>

            </tr>
            <tr>
                <th>Content</th>
                <td> {{ $about->content }} </td>

            </tr>
            <tr>
                <th>On Top</th>
                <td> {{ $about->onTop == 1 ? 'YES' : 'NO' }} </td>

            </tr>
            <tr>
                <th>Last update</th>
                <td> {{ $about->updated_at }} </td>
            </tr>  
        </table>
    </div>



@endsection