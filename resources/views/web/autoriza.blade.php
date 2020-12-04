@extends('layouts.main')


@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif


@endsection
