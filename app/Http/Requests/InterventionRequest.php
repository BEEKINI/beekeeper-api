<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterventionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'apiary_id' => ['required', 'exists:apiaries'],
            'date_start' => ['required', 'date'],
            'date_end' => ['required', 'date'],
            'is_finished' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
