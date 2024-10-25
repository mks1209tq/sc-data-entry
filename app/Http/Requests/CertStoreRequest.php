<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
{
        return Auth::check() && Auth::user()->is_admin;
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'document' => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png',
            'project_id' => 'required',
            'order_id' => 'required',
            'pc_id' => 'required',
            'latest_pc_id' => 'required',
        ];
    }
}
