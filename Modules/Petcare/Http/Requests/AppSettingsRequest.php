<?php

namespace Modules\Petcare\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $rules = [
            'type' => 'required|in:banner,splash',
        ];

        $type = $this->input('type');

        if ($type === 'banner') {
            $rules += [
                'banner_text' => 'required|string',
                'link_path' => 'nullable|string',
                'link_text' => 'nullable|string',
                'link_type' => 'required|in:link,custom',
            ];
            if ($this->hasFile('banner_image')) {
                $rules['banner_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
            }
        } elseif ($type === 'splash') {
            $rules += [
                'splash_text' => 'required|string',
                'description' => 'nullable|string',
            ];
            if ($this->hasFile('splash_image')) {
                $rules['splash_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:4096';
            }
        }

        return $rules;
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
