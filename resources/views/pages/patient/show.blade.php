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

@if(isset($patient))
{{ $patient }}
<br />
<hr />
{{ $patient->address->first() }}
{{ $patient->phones->first() }}
<hr />
@foreach ($patient->insurances as $key => $insurance)
Insurance {{ $key+1 }}
<br />
{{ $insurance }}
@foreach ($insurance->address as $address)
<br />
{{ $address }}
@endforeach
<hr />
@endforeach
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
