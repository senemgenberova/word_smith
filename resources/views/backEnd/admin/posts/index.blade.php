@extends('backLayout.app')
@section('page_title')
Tables <i class="fa fa-angle-double-right"></i> Post
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
                    <a href="{{route('post_create')}}" class="btn btn-primary colorWhite btn_add"> <i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Last update</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{ strlen($post->title) > 20 ? substr($post->title,0,20) . '..' : $post->title  }}
                            </td>
                            <td>
                                {{ $post->category->category_name}}
                            </td>
                            <td>
                                {{ $post->user->name}}
                            </td>
                            <td>
                                {{ $post->updated_at}}
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-primary colorWhite btn_style" href="{{ route('show_post',$post) }}"><i class="fa fa-eye"></i> Show</a>

                                <a class="btn btn-warning colorWhite btn_style" href="{{ route('edit_post',$post) }}"><i class="fa fa-pencil"></i> Edit</a>

                                <form action="{{route('delete_post',$post)}}" method="post" id="deleteAction">
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

@section('scripts')
<script >
    $(document).ready(function(){
        $('#tblposts').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection