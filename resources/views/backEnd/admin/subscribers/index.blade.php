@extends('backLayout.app')
@section('page_title')
Tables <i class="fa fa-angle-double-right"></i> Subscriber
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
            </div>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Subscriber Email</th>
                        <th>Created At</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $s)
                        <tr>
                            <td>
                                {{ $s->email }}
                            </td>
                            <td>
                                {{ $s->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection