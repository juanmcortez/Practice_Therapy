@extends('layouts.main')

@section('title', 'Welcome'.config('app.separator'))

@section('content')
<div class="row content">
    <div class="col text-center">
        <h1>{{ config('app.name') }}</h1>
    </div>
</div>
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
