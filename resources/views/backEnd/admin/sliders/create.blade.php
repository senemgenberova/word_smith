@extends('backLayout.app')
@section('page_title')
Slider <i class="fa fa-angle-double-right"></i> Create
@stop

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('slider_store') }}" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="title" class="control-label">Title: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" name="title" type="text" id="title" required>
                    </div>
                </div>
                
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="image" class="control-label">Image: </label>
                    </div>
                    <div class="col-sm-5">
                        <input  name="image" type="file" id="image" accept="image/*">                   
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="inSlide" class="control-label">In slide: </label>                    
                    </div>
                    <div class="col-sm-5">
                        <div class="checkbox">
                            <label><input name="inSlide" type="radio" value="1" id="inSlide" checked> Yes</label>
                            <label><input name="inSlide" type="radio" value="0" id="inSlide" > No</label>
                        </div>                  
                    </div>
                </div>
            </div>  

            <div class="form-group">
                <div class="row">
                    <div class="offset-md-1 col-sm-5">
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