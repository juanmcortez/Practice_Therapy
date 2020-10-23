@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')

@if(isset($data))

<table class="table table-bordered table-striped table-hover">
    <thead>
        <th>&nbsp;</th>
        <th>{{ __('Patient') }}</th>
        <th class="text-center">{{ __('Phone') }}</th>
        <th class="text-center">{{ __('SSN') }}</th>
        <th class="text-center">{{ __('Date of Birth') }}</th>
        <th class="text-center">{{ __('Accession #') }}</th>
        <th class="text-center">{{ __('External ID') }}</th>
        <th class="text-center">{{ __('Patient ID') }}</th>
        <th class="text-center">{{ __('Last Srv Date') }}</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">
                <a href="{{ route('patients.detail', ['patient' => $item->id]) }}" class="btn-link">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
            <td>{{ $item->last_name.', '.$item->first_name.' '.$item->middle_name }}</td>
            <td class="text-center">
                {{ $item->phones->first()->code.' ('.$item->phones->first()->area.') '.$item->phones->first()->init.'-'.$item->phones->first()->ends }}
            </td>
            <td class="text-center"> -- </td>
            <td class="text-center"> -- </td>
            <td class="text-center"> -- </td>
            <td class="text-center">{{ $item->externalID }}</td>
            <td class="text-center">{{ $item->id }}</td>
            <td class="text-center"> -- </td>
        </tr>
        @endforeach
    </tbody>
</table>

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
