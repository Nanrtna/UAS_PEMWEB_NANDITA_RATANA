<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupirBusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'no_kendaraan' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'nullable|integer',
        ];
    }
}
