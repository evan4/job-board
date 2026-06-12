<?php

namespace App\Http\Requests;

use App\Models\JobsList;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class JobFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => ['nullable','string','max:255'],
            'min_salary' => ['nullable', 'string'],
            'max_salary' => ['nullable', 'string', 'gt:min_salary'],
            'experience' => ['nullable', Rule::in(JobsList::$experience)],
        ];
    }
}
