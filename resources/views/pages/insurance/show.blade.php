@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')

@if(isset($insurance))
{{ $insurance }}
<hr />
@foreach ($insurance->address as $address)
{{ $address }}
<hr />
@endforeach
@foreach ($insurance->phones as $phone)
{{ $phone }}
@endforeach
<hr />
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
