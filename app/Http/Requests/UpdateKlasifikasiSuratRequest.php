<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKlasifikasiSuratRequest extends FormRequest
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
            'klasifikasi' => 'klasifikasi',
            'keterangan' => 'keterangan',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'klasifikasi' => ['required', Rule::unique('klasifikasi-surats')->ignore($this->id)],
            'keterangan'=> ['nullable'],
        ];
    }
}
