<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => ['required', 'min:8', new CurrentPasswordCheckRule],
            'password' => ['required', 'min:8', 'confirmed', 'different:old_password'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'old_password' => __('current password'),
        ];
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('password');
    }
}
