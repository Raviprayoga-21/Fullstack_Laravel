<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiKaryawanRequest extends FormRequest
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
            'nama_karyawan' => 'required',
            'tanggal_masuk' => 'required',
            'waktu_masuk' => 'required',
            'statuss' => 'required',
            'waktu_keluar' => 'required',
             ];
    }
    public function message()
    {
        return [
            'nama_karyawan.required' => 'Karyawan belum diisi!',
            'tanggal_masuk.required' => 'Tanggal Masuk belum diisi!',
            'waktu_masuk.required' => 'Waktu Masuk belum diisi!',
            'statuss.required' => 'Status belum diisi!',
            'waktu_keluar.required' => 'Waktu Kerja Selesai belum diisi!',
        ];
    }
}
