@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')
@php
foreach ($data as $item) { dd($item->insurances); }
@endphp
<!--
<div class="row content">
    <div class="col text-center">
        <h1>{{ config('app.name') }}</h1>
    </div>
</div>
@if(isset($data))
<div class="row content">
    <div class="col text-center">
        {{ $data->links() }}
    </div>
</div>
@endif
<div class="row content">
    <div class="col text-center">
        @if(isset($data))
        @foreach ($data as $item)
        {{ $item->id.' '.$item->externalID }}
        <br />
        @if(isset($item->name))
        {{ $item->name }}
        @else
        {{ $item->last_name.', '.$item->first_name.' '.$item->middle_name }}
        @endif
        @if(isset($item->specialty))
        <br />
        {{ $item->specialty }}
        @endif
        <hr />
        @endforeach
        @endif
    </div>
</div>
@if(isset($data))
<div class="row content">
    <div class="col text-center">
        {{ $data->links() }}
    </div>
</div>
@endif
-->
@endsection

@push('scripts')
<script type="text/javascript">
    // Add custom scripts here
</script>
@endpush

@push('styles')
<style type="text/css">
    /* Add custom styles here */
</style>
@endpush
