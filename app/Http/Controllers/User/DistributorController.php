<?php

namespace App\Http\Controllers\User;

use App\Models\User\Role;
use Illuminate\Http\Request;
use App\Models\User\Distributor;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreDistributorRequest;
use App\Services\DistributorService;
use App\Services\UserService;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Distributor::class, 'distributor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::with('user')->get();

        $data = [
            'distributors' => $distributors
        ];
        return view('distributor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereIn('id', Role::DISTRIBUTORS)->get();

        $data = [
            'roles' => $roles,
        ];
        return view('distributor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistributorRequest $request, DistributorService $distributorService, UserService $userService)
    {
        $user = $userService->handleCreateUser($request->safe()->only(['email', 'role_id']));
        $distributor = $distributorService->handleCreateDistributor($request->safe()->only(['area']) + ['user_id' => $user->id]);

        return redirect()->route('distributor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        $data = [
            'distributor' => $distributor
        ];
        return view('distributor.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        //
    }
}
