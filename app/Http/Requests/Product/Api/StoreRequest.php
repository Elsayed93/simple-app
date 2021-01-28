<?php

namespace App\Http\Requests\Product\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ProductTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{
    use ProductTrait;
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
            'name' => 'required|min:1|max:255|unique:products,name',
            'price' => 'required',
            'details' => 'required|min:5',
            'image' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        $errors1 = [];

        foreach ($errors as $key => $value) {
            $errors1[] =   $value;
        }

        throw new HttpResponseException(
            $this->apiResponse(null, 400, $errors1)
        );
    }
}
