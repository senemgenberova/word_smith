@extends('backLayout.app')
@section('page_title')
Tables <i class="fa fa-angle-double-right"></i> About
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
                    <a href="{{route('about_create')}}" class="btn btn-primary colorWhite btn_add"> <i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>On Top</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abouts as $a)
                        <tr>
                            <td>
                                {{ strlen($a->title) > 30 ? substr($a->title,0,30) . '..' : $a->title  }}
                            </td>
                            <td>
                                {{ $a->onTop == 1 ? 'YES' : 'NO' }}
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-primary colorWhite btn_style" href="{{ route('show_about',$a) }}"><i class="fa fa-eye"></i> Show</a>

                                <a class="btn btn-warning colorWhite btn_style" href="{{ route('edit_about',$a) }}"><i class="fa fa-pencil"></i> Edit</a>
                                
                                <form action="{{route('delete_about',$a)}}" method="post" id="deleteAction">
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