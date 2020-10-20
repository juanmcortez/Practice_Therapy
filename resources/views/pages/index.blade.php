@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')
@php
//foreach ($data as $item) { dd($item); }
@endphp

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

@foreach ($data as $item)
<div class="row content">
    <div class="col text-center">
        {{ $item->id }}
    </div>
    <div class="col text-center text-muted">
        {{ $item->externalID }}
    </div>
    <div class="col text-center">
        @if(isset($item->name))
        {{ $item->name }}
        @else
        {{ $item->last_name.', '.$item->first_name.' '.$item->middle_name }}
        @endif
    </div>
</div>

@if(isset($item->insurances))
@foreach ($item->insurances as $key => $insurance)
<div class="row content">
    <div class="col text-left">
        Ins {{ $key+1 }}: <span class="text-muted">{{ $insurance->name }}</span>
    </div>
</div>
@endforeach
@endif

@foreach ($item->addresses as $address)
<div class="row content">
    <div class="col text-left">
        Address: <span class="text-muted">{{ $address->main }}</span>
    </div>
    <div class="col text-left">
        <span class="text-muted">{{ $address->extended }}</span>
    </div>
    <div class="col text-left">
        <span class="text-muted">{{ $address->city.', '.$address->state.' '.$address->zip }}</span>
    </div>
    <div class="col text-left">
        <span class="text-muted">{{ $address->country }}</span>
    </div>
</div>
@endforeach

@if(isset($item->specialty))
<div class="row content">
    {{ $item->specialty }}
</div>
@endif

<hr />
@endforeach

<div class="row content">
    <div class="col text-center">
        {{ $data->links() }}
    </div>
</div>
@endif

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
