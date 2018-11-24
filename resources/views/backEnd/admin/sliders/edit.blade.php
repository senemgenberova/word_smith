@extends('backLayout.app')
@section('page_title')
Slider <i class="fa fa-angle-double-right"></i> Edit 
@stop

@section('css')
    .slider_image{
        margin-bottom: 20px;
    }
@stop

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('update_slider',$slider) }}" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="title" class="control-label">Title: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" name="title" type="text" id="title" required value="{{$slider->title}}">
                    </div>
                </div>
                
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="image" class="control-label">Image: </label>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{ asset('/upload/slider/' . $slider->image)}}" class="slider_image" alt="{{ $slider->title }}" width="250"> 
                        <input  name="image" type="file" id="image" accept="image/*">                   
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-1">
                        <label for="inSlide" class=" control-label">In slide: </label>                    
                    </div>
                    <div class="col-sm-5">
                        <div class="checkbox">
                            @if($slider->inSlide == 1)
                                <label><input name="inSlide" type="radio" value="1" id="inSlide" checked> Yes</label>
                                <label><input name="inSlide" type="radio" value="0" id="inSlide" > No</label>
                            @else
                                <label><input name="inSlide" type="radio" value="1" id="inSlide" > Yes</label>
                                <label><input name="inSlide" type="radio" value="0" id="inSlide" checked> No</label>
                            @endif
                            
                        </div>                  
                    </div>
                </div>
            </div>  

            <div class="form-group">
                <div class="row">
                    <div class="offset-sm-1 col-sm-5">
                        <input class="btn btn-primary form-control" type="submit" value="Update">
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