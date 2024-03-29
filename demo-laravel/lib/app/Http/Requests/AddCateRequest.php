<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,cate_name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống tên danh mục',
            'name.unique' => 'Tên danh mục đã trùng'
        ];
    }
}
