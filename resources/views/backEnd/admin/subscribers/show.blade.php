@extends('backLayout.app')
@section('title')
Subscriber
@stop

@section('content')

    <h1>Subscriber</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $subscriber->id }}</td> <td> {{ $subscriber->email }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection