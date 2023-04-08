<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'     => [
                'string',
                'required',
            ],
            'slug'    => [
                'required',
                'unique:posts',
            ],
            'post_content' => [
                'required',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('user_access');
    }
}
