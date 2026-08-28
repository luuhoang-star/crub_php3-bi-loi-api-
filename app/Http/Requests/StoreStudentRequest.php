<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'code'  => ['required', 'string', 'max:255', 'unique:students,code'],
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email'],
            'phone' => ['required', 'string', 'max:20'],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }

    /**
     * Tên thuộc tính hiển thị trong thông báo lỗi tiếng Việt.
     */
    public function attributes(): array
    {
        return [
            'code'  => 'mã sinh viên',
            'name'  => 'họ và tên',
            'email' => 'địa chỉ email',
            'phone' => 'số điện thoại',
            'image' => 'ảnh đại diện',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi validation bằng tiếng Việt.
     */
    public function messages(): array
    {
        return [
            'required' => 'Vui lòng nhập :attribute.',
            'unique'   => ':attribute đã tồn tại trong hệ thống.',
            'email'    => ':attribute không đúng định dạng email.',
            'image'    => ':attribute phải là định dạng hình ảnh.',
            'max'      => ':attribute không được vượt quá :max ký tự (hoặc KB với ảnh).',
        ];
    }
}


