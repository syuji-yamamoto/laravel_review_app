<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'book')
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:10',
            'contents' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力して下さい。',
            'title.min' => 'タイトルは3文字以上入力して下さい。',
            'title.max' => 'タイトルは10文字以下で入力して下さい。',
            'contents.required' => 'レビューを入力して下さい。',
            'contents.max' => 'レビューは255文字以下で入力してください。',
        ];
    }
}
