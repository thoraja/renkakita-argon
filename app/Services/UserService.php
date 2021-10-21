<?php

namespace App\Services;

use Str;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmailWithCredentials;

class UserService {
    public function handleCreateUser($data)
    {
        $data['name'] = $data['name'] ?? Role::find($data['role_id'])->display_name;

        $password = $data['password'] ?? Str::random(16);
        $data['password'] = Hash::make($password);

        $user = User::create($data);

        if ($password) {
            $user->notify(new VerifyEmailWithCredentials($data['email'], $password, Role::find($data['role_id'])->display_name));
        } else {
            $user->sendEmailVerificationNotification();
        }

        return $user;
    }

    public function handleUpdateUser(User $user, $data)
    {
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function handleUpdateProfile(User $user, $data)
    {
        $user->update($data);
    }

    public function handleUpdatePassword(User $user, $data)
    {
        $user->update(['password' => Hash::make($data['password'])]);
    }

}
