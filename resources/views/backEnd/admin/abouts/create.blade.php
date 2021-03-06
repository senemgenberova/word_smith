@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'about','action' => $actions['create']] )
@stop

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('about_store') }}" class="form-horizontal">
            {{ csrf_field()}}

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="title" class=" control-label">Title: </label>
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" name="title" type="text" id="title" required>
                        
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="content" class=" control-label">Content: </label>
                    </div>
                    <div class="col-sm-5">
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10" required></textarea>
                        
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="onTop" class=" control-label">On Top: </label>
                    </div>
                    <div class="col-sm-5">
                        <label>
                            <input name="onTop" type="radio" value="1" id="onTop" checked> Yes
                        </label>
                        <label>
                            <input name="onTop" type="radio" value="0" id="onTop" > No
                        </label>
                                               
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="offset-sm-1 col-sm-5">
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