<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.category_id'=>'required',
            'post.pref_id'=>'required',
            'post.body'=>'required',
        ];
    }
    public function messages(){
        return[
            'post.title.required' => 'タイトルを入力してください',
            'post.category_id.required' => 'カテゴリーを選択してください',
            'post.pref_id.required' => '県を選択してください',
            'post.body.required' => '内容を入力してください',
            ];
    }
}
