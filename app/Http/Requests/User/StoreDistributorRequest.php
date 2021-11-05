<?php

namespace App\Http\Requests\User;

use App\Models\User\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreDistributorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required', 'email', 'unique:App\Models\User\User'
            ],
            'role_id' => [
                'required', Rule::in(Role::DISTRIBUTORS)
            ],
            'area' => [
                'required'
            ],
        ];
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('distributor');
    }
}


