<?php

namespace App\Services;

use App\Http\Requests\UpdateDistributorRequest;
use App\Models\User\Distributor;

class DistributorService {

    public function handleCreateDistributor($data)
    {
        $distributor = Distributor::create($data);
        return $distributor;
    }

    public function handleUpdateDistributor(UpdateDistributorRequest $request)
    {
        $data['id_card_number'] = $request->id_card_number;
        $data['phone_number'] = $request->phone_number;
        $data['address'] = $request->address;
        if ($request->id_card_photo) {
            $data['id_card_photo_uri'] = $request->id_card_photo->store('images');
        }

        return $request->user()->distributor()->update($data);
    }
}
?>
