<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            //
            'title'=>'min:8|max:255|required|unique:articles',
            'category_id'=>'required',
            'content'=>'min:140|required',
            'bajada'=>'required',
            'volanta'=>'required',
            'fuente'=>'required',
            'image'=>'image|required'
        ];
    }
}
