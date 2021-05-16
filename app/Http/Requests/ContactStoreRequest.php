<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            // 'name' => ['required','regex:/^[A-Za-z]{3,}+\s+[A-Za-z]{3,}$/','string','max:50'],
            'name' => ['required','regex:/^[a-zA-Z]+(\s+[a-zA-Z]+)*$/','string','max:50'],
            'email' => ['required', 'email', 'string','max:50'],
            'phone' => ['required', 'regex:/08[789]\d{7}/','digits_between:10,10'],
            'message' => ['required', 'string','max:500'],
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Field name is required.',
            'name.regex' => 'Please input name and surname.',
            'name.string' => 'Please enter valid name and surname',
            'name.max' => 'The max input length is 50.',
            'email.email' => 'Please enter valid email.',
            'email.max' => 'The max input length is 50.',
            'email.string' => 'Please enter valid email',
            'phone.required' => 'Field phone number is required.',
            'phone.digits_between' => 'The phone number must contain 10 digits.',
            'phone.regex' => 'Please enter phone number in this format 0885588111.',
            'message.required' => 'The message field is required.',
            'message.string' => 'Please enter valid message.',
            'message.max' => 'The max input length is 500.',
        ];
    }
}
