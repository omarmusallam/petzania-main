<?php

namespace Modules\Petcare\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        $storeId = $this->route('id');
        return [
            'name' => 'required|string|unique:sale_stores,name,' . $storeId . '|min:3|max:64',
            'description' => 'nullable|string|min:5|max:255',
            'location' => 'required|string',
            'address' => 'nullable|string|max:64',
            'email' => 'required|email',
            'phone' => 'required|string|unique:sale_stores,phone,' . $storeId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'status' => 'nullable|in:0,1',
        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
