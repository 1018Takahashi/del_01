<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        
        return true;
    }

    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.address' => 'required|string|max:500',
            'categories_array.0' => 'required',
        ];
    }
}
