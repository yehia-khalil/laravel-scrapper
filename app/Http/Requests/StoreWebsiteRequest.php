<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWebsiteRequest extends FormRequest
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
            'name' => 'required_without:website_id|required_with:link|string',
            'link' => 'required_without:website_id|required_with:name|url',
            'website_id' => 'required_without_all:link,name|sometimes|exists:websites,id'
        ];
    }
}
