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

@if(isset($data))

<table class="table table-bordered table-striped table-hover">
    <thead>
        <th>&nbsp;</th>
        <th class="text-center">{{ __('Payer ID') }}</th>
        <th>{{ __('Company') }}</th>
        <th class="text-center">{{ __('Phone') }}</th>
        <th class="text-center">{{ __('City, State') }}</th>
        <th class="text-center">{{ __('Default X12 Partner') }}</th>
        <th class="text-center">{{ __('Financial Class') }}</th>
        <th class="text-center">{{ __('Payment Code') }}</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">
                <a href="{{ route('insurances.detail', ['insurance' => $item->id]) }}" class="btn-link">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
            <td class="text-center"> -- </td>
            <td>{{ $item->name }}</td>
            <td class="text-center">
                @if(!empty($item->phones->first()))
                {{ $item->phones->first()->code.' ('.$item->phones->first()->area.') '.$item->phones->first()->init.'-'.$item->phones->first()->ends }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->address->first()))
                {{ $item->address->first()->city.', '.$item->address->first()->state }}
                @else
                --
                @endif
            </td>
            <td class="text-center"> -- </td>
            <td class="text-center"> -- </td>
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
