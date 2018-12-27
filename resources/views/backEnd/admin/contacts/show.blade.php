@extends('backLayout.app')
@section('page_title')
@include('backLayout.data',['tableName' => 'contact','action' => $actions['show']] )
@stop

@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped bg_white">
            <tr>
                <th>Email</th>
                <td> {{ $contact->email }} </td>
   
            </tr>
            <tr>
                <th>Phone Number</th>
                <td> {{ $contact->phone_number }} </td>
            </tr>
            <tr>
                <th>Address</th>
                <td> {{ $contact->address }} </td>
            </tr> 
            <tr>
                <th>Last update</th>
                <td> {{ $contact->updated_at }} </td>
            </tr> 
        </table>
    </div>

@endsection