<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDistributorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_card_number' => [ $this->user()->distributor->id_card_number ? 'nullable' : 'required', 'numeric'],
            'phone_number' => ['required', 'numeric'],
            'address' => ['required'],
            'id_card_photo' => [ $this->user()->distributor->id_card_photo_uri ? 'nullable' : 'required', 'image'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('distributor');
    }
}
