@extends('backLayout.app')
@section('page_title')
Category <i class="fa fa-angle-double-right"></i> Data
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