@extends('layouts.main')

@if(isset($title) && !empty($title))
@section('title', $title.config('app.separator'))
@else
@section('title', '---'.config('app.separator'))
@endif

@section('content')

@if(isset($patient))
<table class="table">
    <tbody>
        <tr>
            <td width="20%">
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="id">{{ __('PID') }}</label>
                    <input type="text" name="id" class="form-control-plaintext col-8" value="{{ $patient->id }}"
                        readonly disabled placeholder="{{ __('ID') }}">
                </div>
            </td>
            <td width="20%">
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="externalID">{{ __('Ext. ID') }}</label>
                    <input type="text" name="externalID" class="form-control col-8" value="{{ $patient->externalID }}"
                        placeholder="{{ __('External ID') }}">
                </div>
            </td>
            <td width="20%">
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="last_name">{{ __('Last') }}</label>
                    <input type="text" name="last_name" class="form-control col-8" value="{{ $patient->last_name }}"
                        placeholder="{{ __('Last Name') }}">
                </div>
            </td>
            <td width="20%">
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="first_name">{{ __('First') }}</label>
                    <input type="text" name="first_name" class="form-control col-8" value="{{ $patient->first_name }}"
                        placeholder="{{ __('First Name') }}">
                </div>
            </td>
            <td width="20%">
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="middle_name">{{ __('Middle') }}</label>
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
            <td colspan="4">&nbsp;</td>
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
            <td>
                <div class="form-group row">
                    <label class="col-2 col-form-label text-right" for="phones">&nbsp;</label>
                    <input type="text" name="phones[code]" class="form-control col-3 text-center"
                        value="{{ $phone->code }}" placeholder="{{ __('Code') }}" maxlength="8">
                    <input type="text" name="phones[area]" class="form-control col-3 text-center"
                        value="( {{ $phone->area }} )" placeholder="{{ __('Area') }}" maxlength="3">
                    <input type="text" name="phones[initends]" class="form-control col-4 text-center"
                        value="{{ $phone->init }} - {{ $phone->ends }}" placeholder="{{ __('Phone') }}" maxlength="3">
                </div>
            </td>
            <td colspan="3">&nbsp;</td>
        </tr>
        @endforeach
        @foreach ($patient->insurances as $key => $insurance)
        <tr class="bg-dark">
            <td class="text-light" colspan="5">{{ __('Insurance').' '.($key+1).':' }}</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Ins. Type') }}</label>
                    <select name="insurances[][name]" class="form-control col-8">
                        @foreach(array('primary','secondary','tertiary') as $option)
                        <option value="{{ $option }}">
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Ins. Provider') }}</label>
                    <select name="insurances[][name]" class="form-control col-8">
                        @foreach($insList as $option)
                        <option value="{{ $option->id }}" @if($insurance->name==$option->name) selected @endif>
                            {{ ucfirst($option->name) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Plan') }}</label>
                    <input type="text" name="insurances[][plan]" class="form-control col-8" value=""
                        placeholder="{{ __('Plan Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Policy #') }}</label>
                    <input type="text" name="insurances[][policy]" class="form-control col-8" value=""
                        placeholder="{{ __('Policy Number') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Group #') }}</label>
                    <input type="text" name="insurances[][group]" class="form-control col-8" value=""
                        placeholder="{{ __('Group Number') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Eff. Date') }}</label>
                    <input type="text" name="insurances[][effective]" class="form-control col-8"
                        value="@if($insurance->default_effective!='2020-01-01 00:00:00') {{ $insurance->default_effective }} @endif"
                        placeholder="{{ __('Effective Date') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Ter. Date') }}</label>
                    <input type="text" name="insurances[][termination]" class="form-control col-8"
                        value="@if($insurance->default_termination!='2020-01-01 00:00:00') {{ $insurance->default_termination }} @endif"
                        placeholder="{{ __('Termination Date') }}">
                </div>
            </td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Empl.') }}</label>
                    <input type="text" name="insurances[][subemployer]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Employer') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Addr.') }}</label>
                    <input type="text" name="insurances[][subaddmain]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Address') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">&nbsp;</label>
                    <input type="text" name="insurances[][subaddext]" class="form-control col-8" value="">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. City') }}</label>
                    <input type="text" name="insurances[][subcity]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber City') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. State') }}</label>
                    <input type="text" name="insurances[][substate]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber State') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Zip') }}</label>
                    <input type="text" name="insurances[][subzip]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Zip') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Country') }}</label>
                    <input type="text" name="insurances[][subcountry]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Country') }}">
                </div>
            </td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr class="bg-light">
            <td colspan="5">{{ __('Relationship') }}</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Type') }}</label>
                    <select name="insurances[][relsubscriber][type]" class="form-control col-8">
                        @foreach(array('self','spouse','child', 'other') as $option)
                        <option value="{{ $option }}">
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Subscriber') }}</label>
                    <input type="text" name="insurances[][relsubscriber][last_name]" class="form-control col-8" value=""
                        placeholder="{{ __('Last Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">&nbsp;</label>
                    <input type="text" name="insurances[][relsubscriber][first_name]" class="form-control col-8"
                        value="" placeholder="{{ __('First Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">&nbsp;</label>
                    <input type="text" name="insurances[][relsubscriber][middle_name]" class="form-control col-8"
                        value="" placeholder="{{ __('Middle Name') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('DOB') }}</label>
                    <input type="text" name="insurances[][relsubscriber][dob]" class="form-control col-8" value=""
                        placeholder="{{ __('Birthdate') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Gender') }}</label>
                    <select name="insurances[][relsubscriber][gender]" class="form-control col-8">
                        @foreach(array('male','female', 'other') as $option)
                        <option value="{{ $option }}">
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('SS#') }}</label>
                    <input type="text" name="insurances[][relsubscriber][ssn]" class="form-control col-8" value=""
                        placeholder="{{ __('Social Security #') }}">
                </div>
            </td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Copay') }}</label>
                    <input type="text" name="insurances[][relsubscriber][copay]" class="form-control col-8" value=""
                        placeholder="$ 0.00">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances"
                        title="{{ __('Accept Assignment') }}">{{ __('Acc. Ass.') }}</label>
                    <select name="insurances[][relsubscriber][assignment]" class="form-control col-8">
                        @foreach(array('yes','no') as $option)
                        <option value="{{ $option }}" @if($phone->type==$option) selected @endif>
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances"
                        title="{{ __('Secondary Medicare Type') }}">{{ __('Sec. Medi.') }}</label>
                    <select name="insurances[][relsubscriber][assignment]" class="form-control col-8">
                        @foreach(array('N/A','') as $option)
                        <option value="{{ $option }}" @if($phone->type==$option) selected @endif>
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Phone') }}</label>
                    <select name="insurances[][relsubscriber][phone][type]" class="form-control col-8">
                        @foreach(array('cellphone','emergency','fax','guardian','home','office','work') as $option)
                        <option value="{{ $option }}" @if($phone->type==$option) selected @endif>
                            {{ ucfirst($option) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-2 col-form-label text-right" for="insurances">&nbsp;</label>
                    <input type="text" name="insurances[][relsubscriber][phone][code]"
                        class="form-control col-3 text-center" value="+1" placeholder="{{ __('Code') }}" maxlength="8">
                    <input type="text" name="insurances[][relsubscriber][phone][area]"
                        class="form-control col-3 text-center" value="( 000 )" placeholder="{{ __('Area') }}"
                        maxlength="3">
                    <input type="text" name="insurances[][relsubscriber][phone][initends]"
                        class="form-control col-4 text-center" value="000 - 0000" placeholder="{{ __('Phone') }}"
                        maxlength="3">
                </div>
            </td>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Addr.') }}</label>
                    <input type="text" name="insurances[][relsubscriber][addrmain]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Address') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">&nbsp;</label>
                    <input type="text" name="insurances[][relsubscriber][addrext]" class="form-control col-8" value="">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. City') }}</label>
                    <input type="text" name="insurances[][relsubscriber][addrcity]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber City') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. State') }}</label>
                    <input type="text" name="insurances[][relsubscriber][addrstate]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber State') }}">
                </div>
            </td>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Zip') }}</label>
                    <input type="text" name="insurances[][relsubscriber][addrzip]" class="form-control col-8" value=""
                        placeholder="{{ __('Subscriber Zip') }}">
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-group row">
                    <label class="col-4 col-form-label text-right" for="insurances">{{ __('Sub. Country') }}</label>
                    <input type="text" name="insurances[][relsubscriber][addrcountry]" class="form-control col-8"
                        value="" placeholder="{{ __('Subscriber Country') }}">
                </div>
            </td>
            <td colspan="4">&nbsp;</td>
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
