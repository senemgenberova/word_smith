@extends('backLayout.app')
@section('page_title')
Contact <i class="fa fa-angle-double-right"></i> Create
@stop

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('contact_store') }}"  class="form-horizontal">
            {{ csrf_field()}}

            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="email" class="control-label">Email: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" required name="email" type="text" id="email">
                    
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="email" class="control-label">Phone number: </label>
                        
                    </div>
                    <div class="col-sm-5">
                        <input class="form-control" required name="phone_number" type="text" id="phone_number">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="address" class="control-label">Address: </label>
                                
                    </div>
                    
                    <div class="col-sm-5">
                        <textarea class="form-control" required name="address" cols="50" rows="10" id="address"></textarea>
                        
                    </div>
                </div>

            </div>


            <div class="form-group">
                <div class="row">
                    <div class="offset-sm-2 col-sm-5">
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