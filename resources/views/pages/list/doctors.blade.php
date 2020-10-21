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
        <th class="text-center">{{ __('Organization') }}</th>
        <th>{{ __('Doctor') }}</th>
        <th class="text-center">{{ __('NPI') }}</th>
        <th class="text-center">{{ __('Type') }}</th>
        <th class="text-center">{{ __('Specialty') }}</th>
        <th class="text-center">{{ __('Phone') }}</th>
        <th class="text-center">{{ __('Fax') }}</th>
        <th class="text-center">{{ __('Address') }}</th>
        <th class="text-center">{{ __('City') }}</th>
        <th class="text-center">{{ __('State') }}</th>
        <th class="text-center">{{ __('Zip') }}</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">
                <a href="{{ route('doctors.detail', ['doctor' => $item->id]) }}" class="btn-link">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
            <td class="text-center"> -- </td>
            <td class="text-center">{{ $item->last_name.', '.$item->first_name.' '.$item->middle_name }}</td>
            <td class="text-center"> -- </td>
            <td class="text-center"> -- </td>
            <td class="text-center">{{ $item->specialty }}</td>
            <td class="text-center">
                @if(!empty($item->phones->first()))
                {{ $item->phones->first()->code.' ('.$item->phones->first()->area.') '.$item->phones->first()->init.'-'.$item->phones->first()->ends }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->phones->last()))
                {{ $item->phones->last()->code.' ('.$item->phones->last()->area.') '.$item->phones->last()->init.'-'.$item->phones->last()->ends }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->address->first()))
                {{ $item->address->first()->main.' '.$item->address->first()->extended }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->address->first()->city))
                {{ $item->address->first()->city }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->address->first()->state))
                {{ $item->address->first()->state }}
                @else
                --
                @endif
            </td>
            <td class="text-center">
                @if(!empty($item->address->first()->zip))
                {{ $item->address->first()->zip }}
                @else
                --
                @endif
            </td>
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
