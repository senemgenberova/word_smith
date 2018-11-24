@extends('backLayout.app')
@section('page_title')
Tables <i class="fa fa-angle-double-right"></i> Slider
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
                    <a href="{{route('slider_create')}}" class="btn btn-primary colorWhite btn_add"> <i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>In slide</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>
                                <a href="{{ route('show_slider', $slider) }}">{{ substr($slider->title,0,15) }} ..</a>
                            </td>
                            <td>
                                <img src="{{ asset('/upload/slider/' . $slider->image  ) }}" alt="{{substr($slider->title,0,15)}}" width="150">
                            </td>
                            <td>{{($slider->inSlide == 1) ? 'YES' : 'NO'}}</td>
                            <td>
                                <a class="btn btn-primary colorWhite btn_style" href="{{ route('edit_slider',$slider) }}"><i class="fa fa-pencil"></i> Edit</a>

                                <form action="{{route('delete_slider',$slider)}}" method="post" id="deleteAction">
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