<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class DetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}