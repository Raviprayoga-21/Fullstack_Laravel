<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'nama_menu' => 'required',
            'jenis_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => 'required',
        ]; 
    }

    public function message()
    {
        return [
            'nama_menu.required' => 'Menu belum diisi!',
            'jenis_id.required' => 'Jenis belum diisi!',
            'harga.required' => 'Harga belum diisi!',
            'stok.required' => 'Stok belum diisi!',
            'image.required' => 'Image belum diisi!',
            'deskripsi.required' => 'Deskripsi belum diisi!',
        ];
    }
}
