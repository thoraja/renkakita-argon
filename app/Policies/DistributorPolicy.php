<?php

namespace App\Policies;

use App\Models\User\Role;
use App\Models\User\User;
use App\Models\User\Distributor;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistributorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return in_array($user->role->id, Role::ADMINS);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Distributor $distributor)
    {
        return $user->id == $distributor->user->id || in_array($user->role->id, Role::ADMINS);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return in_array($user->role->id, [Role::SUPER_ADMIN, Role::GENERAL_ADMIN]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Distributor $distributor)
    {
        return $user->id == $distributor->user->id || in_array($user->role->id, [Role::SUPER_ADMIN, Role::GENERAL_ADMIN]);
    }

    /**
     * Determine whether the user can verify models.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function verify(User $user)
    {
        return in_array($user->role->id, [Role::SUPER_ADMIN, Role::GENERAL_ADMIN]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Distributor $distributor)
    {
        return in_array($user->role->id, [Role::SUPER_ADMIN, Role::GENERAL_ADMIN]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Distributor $distributor)
    {
        return in_array($user->role->id, [Role::SUPER_ADMIN, Role::GENERAL_ADMIN]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Distributor $distributor)
    {
        return $user->role->id == Role::SUPER_ADMIN;
    }
}
