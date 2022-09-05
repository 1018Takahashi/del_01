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
            'post.address' => 'required|string|max:4000',
            'post.camera' => 'required|string|max:100',
            'post.lens' => 'required|string|max:100',
            'post.f' => 'required|string|max:100',
            'post.ss' => 'required|string|max:100',
            'post.iso' => 'required|string|max:100',
        ];
    }
}
