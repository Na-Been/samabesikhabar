<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules += [
                'user_name' => 'required|unique:users, user_name,' . $this->get('id'),
                'email' => 'required|unique:users,email,' . $this->get('id')
            ];

        } else {
            $rules += [
                'user_name' => 'required|unique:users',
                'email' => 'required|unique:users'
            ];
        }
        $rules += [
            'first_name' => 'required',
            'last_name' => 'required',
            'nick_name' => 'required',
            'display_name' => 'required',
            'role' => 'required',
            'avatar.*' => 'max:4320|mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp,PNG',
        ];

        if (request()->has('password')) {
            $rules += [
                'password' => 'required|min:8|confirmed',
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
