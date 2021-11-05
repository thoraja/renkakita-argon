<?php

namespace App\Http\Controllers\User;

use App\Models\User\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Services\DistributorService;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Http\Requests\User\UpdateDistributorRequest;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::where('id', auth()->user()->id)->with(['role', 'distributor'])->first();

        $data = [
            'user' => $user,
        ];
        return view('profile.show', $data);
    }

    public function editProfile(UpdateProfileRequest $request, UserService $userService)
    {
        $userService->handleUpdateProfile($request->user(), $request->validated());

        return redirect()->route('profile.show')->with('status.profile', __('Profile successfully updated.'));
    }

    public function editPassword(UpdatePasswordRequest $request, UserService $userService)
    {
        $userService->handleUpdatePassword($request->user(), $request->validated());

        return redirect()->route('profile.show')->with('status.password', __('Password successfully updated.'));
    }

    public function editDistributor(UpdateDistributorRequest $request, DistributorService $distributorService)
    {
        $distributorService->handleUpdateDistributor($request->validated());

        return redirect()->route('profile.show')->with('status.distributor', __('Distributor information successfully updated.'));
    }
}
