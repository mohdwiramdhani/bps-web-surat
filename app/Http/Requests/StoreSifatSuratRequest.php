<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSifatSuratRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    public function attributes(): array
    {
        return [
            'sifat' => 'sifat',
            'keterangan' => 'keterangan',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'sifat' => ['required', Rule::unique('sifat_surats')],
            'keterangan'=> ['nullable'],
        ];
    }
}
