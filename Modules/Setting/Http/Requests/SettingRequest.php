<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules += [
            'site_title' => 'required',
            'address' => 'required',
            'email' => 'required',
            'director' => 'required',
            'mobile_number' => 'required|min:10',
            'phone_number' => 'required|min:9',
            'postal_code' => 'nullable',
            'registration_number' => 'nullable',
            'skype_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'company_details' => 'required'
        ];

        if (request()->hasFile('logo')) {
            $rules += [
                'logo' => 'required',
                'logo.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ];
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
