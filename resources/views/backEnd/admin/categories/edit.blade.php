@extends('backLayout.app')
@section('page_title')
Category <i class="fa fa-angle-double-right"></i> Edit
@stop

@section('content')

    <form method="POST" action="{{ route('update_cat',$category) }}" class="form-horizontal">
        {{ csrf_field()}}

        <div class="form-group ">
            <div class="row">
                <div class="col-sm-2">
                    <label for="category_name" class=" control-label">Category Name: </label>
                </div>
                <div class="col-sm-4">
                    <input class="form-control" required name="category_name" type="text" id="category_name" value="{{$category->category_name}}">
                    
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="offset-sm-2 col-sm-4">
                    <input class="btn btn-primary form-control" type="submit" value="Create">
                </div>  
            </div>

        </div>
    </form>

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection