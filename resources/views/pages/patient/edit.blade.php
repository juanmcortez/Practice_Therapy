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

@if(isset($patient))
<table class="table">
    <tbody>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="id">{{ __('PID') }}</label>
                    <input type="text" name="id" class="form-control-plaintext col-8" value="{{ $patient->id }}"
                        readonly disabled placeholder="{{ __('PID') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="externalID">{{ __('External ID') }}</label>
                    <input type="text" name="externalID" class="form-control col-8" value="{{ $patient->externalID }}"
                        placeholder="{{ __('External ID') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="last_name">{{ __('Last Name') }}</label>
                    <input type="text" name="last_name" class="form-control col-8" value="{{ $patient->last_name }}"
                        placeholder="{{ __('Last Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="first_name">{{ __('First Name') }}</label>
                    <input type="text" name="first_name" class="form-control col-8" value="{{ $patient->first_name }}"
                        placeholder="{{ __('First Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="middle_name">{{ __('Middle Name') }}</label>
                    <input type="text" name="middle_name" class="form-control col-8" value="{{ $patient->middle_name }}"
                        placeholder="{{ __('Middle Name') }}">
                </div>
            </td>
        </tr>
        @foreach ($patient->address as $address)
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">{{ __('Address') }}</label>
                    <input type="text" name="address[main]" class="form-control col-8" value="{{ $address->main }}"
                        placeholder="{{ __('Address') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">&nbsp;</label>
                    <input type="text" name="address[extended]" class="form-control col-8"
                        value="{{ $address->extended }}" placeholder="{{ __('Extended') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">{{ __('City') }}</label>
                    <input type="text" name="address[city]" class="form-control col-8" value="{{ $address->city }}"
                        placeholder="{{ __('City') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">{{ __('State') }}</label>
                    <input type="text" name="address[state]" class="form-control col-8" value="{{ $address->state }}"
                        placeholder="{{ __('State') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">{{ __('Zip') }}</label>
                    <input type="text" name="address[zip]" class="form-control col-8" value="{{ $address->zip }}"
                        placeholder="{{ __('Zip') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="address">{{ __('Country') }}</label>
                    <input type="text" name="address[country]" class="form-control col-8"
                        value="{{ $address->country }}" placeholder="{{ __('Country') }}">
                </div>
            </td>
            <td colspan="8">&nbsp;</td>
        </tr>
        @endforeach
        @foreach ($patient->phones as $phone)
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="phones">{{ __('Phone') }}</label>
                    <select name="phones[type]" class="form-control col-8">
                        @foreach(array('cellphone','emergency','fax','guardian','home','office','work') as $option)
                        <option value="{{ $option }}" @if($phone->type==$option) selected @endif>
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td colspan="3">
                <div class="form-group row">
                    <label class="col-1 col-form-label text-right" for="phones">&nbsp;</label>
                    <input type="text" name="phones[code]" class="form-control col-2 text-center"
                        value="{{ $phone->code }}" placeholder="{{ __('Code') }}" maxlength="8">
                    <input type="text" name="phones[area]" class="form-control col-3 text-center"
                        value="{{ $phone->area }}" placeholder="{{ __('Area') }}" maxlength="3">
                    <input type="text" name="phones[init]" class="form-control col-3 text-center"
                        value="{{ $phone->init }}" placeholder="{{ __('Phone') }}" maxlength="3">
                    <input type="text" name="phones[ends]" class="form-control col-3 text-center"
                        value="{{ $phone->ends }}" placeholder="{{ __('Phone') }}" maxlength="4">
                </div>
            </td>
            <td colspan="5">&nbsp;</td>
        </tr>
        @endforeach
        @foreach ($patient->insurances as $key => $insurance)
        <tr class="bg-dark">
            <td class="text-light" colspan="8">{{ __('Insurance').' '.($key+1).':' }}</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Company') }}</label>
                    <select name="insurances[][name]" class="form-control col-8">
                        @foreach($insList as $option)
                        <option value="{{ $option->id }}" @if($insurance->name==$option->name) selected @endif>
                            {{ ucfirst($option->name) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td colspan="8"></td>
        </tr>
        @endforeach
    </tbody>
</table>
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
