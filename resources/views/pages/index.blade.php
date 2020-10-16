@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
<div class="row content">
    <div class="col text-center">
        <h1>{{ config('app.name') }}</h1>
    </div>
</div>
@endsection
