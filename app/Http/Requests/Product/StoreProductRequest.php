<?php

namespace App\Http\Requests\Product;

use App\Models\Company;
use App\Models\Product\Category;
use App\Models\Product\Material;
use App\Models\User\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return in_array(Auth::user()->role->id, Role::ADMINS);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'company_id' => [
                'required', Rule::in(Company::pluck('id')),
            ],
            'material_id' => [
                'required', Rule::in(Material::pluck('id')),
            ],
            'category_id' => [
                'required', Rule::in(Category::pluck('id')),
            ],
            'stock' => [
                'numeric', 'integer',
            ],
            'price' => [
                'required', 'numeric', 'integer'
            ],
            'description' => [
                'required'
            ]
        ];
    }
}
