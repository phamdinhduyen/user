<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class ProductRequset extends FormRequest
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
            'product' => 'required|min:3',
            'price'=> 'required|integer'
        ];
    }

    public function messages(){
        return [
            'product.required' => ':attribute bat buoc phai nhap',
            'product.min' => ':attribute bat buoc lon hon :min ky tu',
            'price.required' => ':attribute bat buoc phai nhap',
            'integer' => ':attribute phai la so'
        ];
    }

    public function attributes(){
        return [
            'product' => 'Ten san pham',
            'price' => 'Gia san pham'
        ];
    }

    protected function withValidator($validator){
        $validator->after(function ($validator) {
            if($validator->errors()->count() > 0){
                $validator->errors()->add('msg', 'da co loi xay ra vui long kiem tra lai');
            }
         });
    }
    // khi xu ly truoc validate
    protected function prepareForValidation(){
        $this->merge([
            'create_at' => date('Y-m-d H:i:s'),
        ]);
    }

    // protected function failedAuthorization(){
    //     // throw new AuthorizationException('Ban khong co quyen truy cap');
    //     // chuyen huong
    //     throw new HttpResponseException(redirect('/product')-> with('msg','ban khong co quyen truy cap') );
    // }
}   