<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoneyProdRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'apiary_id' => ['required', 'numeric'],
            'value' => ['required', 'numeric'],
        ];
    }
}
