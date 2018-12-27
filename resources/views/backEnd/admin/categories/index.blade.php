@extends('backLayout.app')
@section('page_title')
Tables <i class="fa fa-angle-double-right"></i> Category
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card-title">
                        <strong >Data Table</strong>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a href="{{route('category_create')}}" class="btn btn-primary colorWhite btn_add"> <i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-primary colorWhite btn_style" href="{{ route('show_category',$category) }}"><i class="fa fa-eye"></i> Show</a>

                                <a class="btn btn-warning colorWhite btn_style" href="{{ route('edit_category',$category) }}"><i class="fa fa-pencil"></i> Edit</a>

                                <form action="{{route('delete_category',$category)}}" method="post" id="deleteAction">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" id="btnDelete">
                                        <i class="fa fa-exclamation-circle"></i> Delete
                                    </button>
                                </form>                                    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection