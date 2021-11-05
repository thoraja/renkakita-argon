<?php

namespace App\Services;

use App\Models\User\Distributor;
use Illuminate\Support\Facades\Auth;

class DistributorService {

    public function handleCreateDistributor($data)
    {
        $distributor = Distributor::create($data);
        return $distributor;
    }

    public function handleUpdateDistributor($data)
    {
        if ($data['id_card_photo']) {
            $data['id_card_photo_uri'] = $data['id_card_photo']->store('images/user/'.Auth::id());
            unset($data['id_card_photo']);
        }

        return Auth::user()->distributor()->update($data);
    }
}
