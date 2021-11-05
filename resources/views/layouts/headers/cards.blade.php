<div class="header bg-gradient-primary pb-7 pt-3 pt-md-6">
    <div class="container">
        <div class="header-body">
            @auth
            @if (in_array(Auth::user()->role->id, \App\Models\User\Role::DISTRIBUTORS) && !Auth::user()->distributor->is_verified)
            <div class="alert alert-warning" role="alert">
                {{ __('This account is not verified yet. Please update your distributor profile and contact our administrator.') }}
                <a href="{{ route('profile.show') }}" class="text-white"><u>Update Profile</u></a>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
