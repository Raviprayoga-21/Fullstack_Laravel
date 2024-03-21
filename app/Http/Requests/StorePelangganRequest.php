<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'nama_pelanggan' => 'required',
           'email' => 'required',
           'nomor_telepon' => 'required',
           'alamat' => 'required',
           'jenis_kelamin' => 'required',
            ];
    }
     public function message()
    {
         return [
            'nama_pelanggan.required' => 'Pelanggan belum diisi!',
            'email.required' => 'Email belum diisi!',
            'nomor_telepon.required' => 'Nomor Telepon belum diisi!',
            'alamat.required' => 'Alamat belum diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin belum diisi!',
            ];
     }
}
