<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'name' => 'required|max:255',
            'motto' =>'nullable',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'github_url' => 'nullable',
            'photo_profile' => 'image|file|max:1024'
        ];
    }
}
