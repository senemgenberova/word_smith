@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'post','action' => $actions['create']] )
@stop

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('post_store') }}"  class="form-horizontal" enctype="multipart/form-data">

            {{ csrf_field()}}

            <div class="form-group ">

                <div class="row">
                    <div class="col-sm-2">
                        <label for="title" class="control-label">Title: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" name="title" type="text" id="title" required>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="category_id" class="control-label">Category name: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
            
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="image" class="control-label">Image: </label>
                    </div>
                    <div class="col-sm-5">
                        <input  name="image" id="image" type="file" accept="image/*" required/>
                        
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="description" class="control-label">Description: </label>
                    </div>
                    <div class="col-sm-5">
                        <textarea class="form-control post_desc" name="description" cols="50" rows="6" id="description" require></textarea>
                    </div>     
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="offset-md-2 col-sm-5">
                        <input class="btn btn-primary form-control" type="submit" value="Create">
                    </div>
                </div>

            </div>
        </form>
    </div>


    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection