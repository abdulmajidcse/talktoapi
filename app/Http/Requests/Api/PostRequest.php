<?php

namespace App\Http\Requests\Api;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
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
            'category_id' => ['required', 'integer',
                                function ($attribute, $value, $fail) {
                                    $category = Category::where('user_id', auth('api')->id())->where('id', $value)->first();
                                    if (! $category) {
                                        $fail('The category not found.');
                                    }
                                },
                            ],
            'title'       => 'required|string',
            'image'       => 'nullable|image|mimes:png,jpg,jpeg|max:4000',
            'content'     => 'required|string',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'category_id' => 'category',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = talkToApiResponse($validator->getMessageBag(), '', 422, false);
        throw new ValidationException($validator, $response);
    }
}
