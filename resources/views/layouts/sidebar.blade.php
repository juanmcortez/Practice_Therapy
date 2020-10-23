<div class="sidebar-header">
    <h3>{{ __(config('app.name')) }}</h3>
    <strong>{{ __('PT') }}</strong>
</div>

<ul class="list-unstyled components">
    <li>
        <a href="{{ route('dashboard') }}">
            <i class="fas fa-chart-bar" title="{{ __('Dashboard') }}"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>
    <li>
        <a href="#patientSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-hospital-user" title="{{ __('Patients') }}"></i>
            <span>{{ __('Patients') }}</span>
        </a>
        <ul class="collapse list-unstyled" id="patientSubmenu">
            <li>
                <a href="{{ route('patients.list') }}">
                    <i class="fas fa-list" title="{{ __('List all patients') }}"></i>
                    <span>{{ __('List all') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-search" title="{{ __('Search patients') }}"></i>
                    <span>{{ __('Search') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-plus" title="{{ __('New patients') }}"></i>
                    <span>{{ __('New') }}</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#insuranceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-laptop-medical"></i>
            <span>{{ __('Insurances') }}</span>
        </a>
        <ul class="collapse list-unstyled" id="insuranceSubmenu">
            <li>
                <a href="{{ route('insurances.list') }}">
                    <i class="fas fa-list"></i>
                    <span>{{ __('List all') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-search"></i>
                    <span>{{ __('Search') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-plus"></i>
                    <span>{{ __('New') }}</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#doctorsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-user-md"></i>
            <span>{{ __('Doctors') }}</span>
        </a>
        <ul class="collapse list-unstyled" id="doctorsSubmenu">
            <li>
                <a href="{{ route('doctors.list') }}">
                    <i class="fas fa-list"></i>
                    <span>{{ __('List all') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-search"></i>
                    <span>{{ __('Search') }}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-plus"></i>
                    <span>{{ __('New') }}</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
