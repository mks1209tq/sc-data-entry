<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassportStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        // dd($this->all());
        return [
            
            'employee_id' => 'required',
            'file_name' => 'required',
            'document' => 'required', // 10MB Max
            // 'document' => 'required|file|max:10240', // 10MB Max
        ];
    }
}
