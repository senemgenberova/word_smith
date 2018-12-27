@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'category','action' => $actions['show']] )
@stop

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg_white">
            <tr>
                <th>Category Name</th>
                <td> {{ $category->category_name }} </td>

            </tr>
            <tr>
                <th>Last update</th>
                <td> {{ $category->updated_at }} </td>
            </tr>  
        </table>
    </div>

@endsection