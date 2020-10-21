@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')

<div class="row content">
    <div class="col text-center">
        <h1>{{ $title }}</h1>
    </div>
</div>
<hr />

@if(isset($doctor))
{{ $doctor }}
<hr />
@foreach ($doctor->address as $address)
{{ $address }}
<hr />
@endforeach
@foreach ($doctor->phones as $phone)
{{ $phone }}
<br />
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
