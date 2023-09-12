<?php

namespace Modules\Petcare\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:64',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'copy_right' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'telepoh' => 'nullable|string',
            'facebook' => 'nullable|string',
            'tnstagram' => 'nullable|string',
            'tnapchat' => 'nullable|string',
            'twitter' => 'nullable|string',
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
