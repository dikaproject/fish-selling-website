<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_category_id' => 'nullable|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $this->route('product'),
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:3048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'nullable|in:paid,unpaid',
            'status_delivery' => 'nullable|in:ready,sent,delivered',
            'is_favorite' => 'nullable|boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'product_category_id' => 'Product Category',
            'name' => 'Nama Produk',
            'slug' => 'Slug / link produk',
            'description' => 'Description Produk',
            'thumbnail' => 'Thumbnail Produk',
            'image' => 'Image Produk',
            'price' => 'Price Produk',
            'stock' => 'Stock Produk',
            'status' => 'Status Produk',
            'status_delivery' => 'Status Delivery Produk',
            'is_favorite' => 'Is Favorite Produk',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'image' => ':attribute harus berupa gambar',
            'mimes' => ':attribute harus berupa file dengan format: :values',
            'max' => ':attribute tidak boleh lebih dari :max KB',
            'string' => ':attribute harus berupa teks',
            'exists' => ':attribute tidak ditemukan',
            'unique' => ':attribute sudah digunakan',
            'regex' => ':attribute harus berupa link YouTube yang valid',
        ];
    }
}
