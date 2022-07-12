<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => ':attribute bắt buộc phải nhập',
            'product_name.min' => ':attribute không được nhỏ hơn :min kí tự',
            'product_price.required' => ':attribute bắt buộc phải nhập',
            'product_price.integer' => ':attribute phải là số'
        ];
    }

    public function attributes()
    {
        return [
            'product_name' => 'Tên Sản Phẩm',
            'product_price' => 'Giá Sản Phẩm'
        ];
    }

    protected function withValidator($validator){
       if($validator->errors()-> count() > 0){
            $validator->errors()->add('msg' , 'Đã có lỗi xảy ra , vui lòng kiểm tra lại');
       }
    }

    protected function prepareForValidation()
    {
        $this -> merge([
            'create at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function failedAuthorization(){
        //throw new AuthorizationException('Ban khong the truy cap');

        //throw new HttpResponseException(redirect('/')->with('msg' , 'Bạn không có quyền truy cập'));

        throw new HttpResponseException(abort('404'));
    }
}
