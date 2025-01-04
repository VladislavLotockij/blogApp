<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обезательно для заполнения',
            'title.string' => 'Данные должны соотвествовать строчному типу',
            'content.required' => 'Это поле обезательно для заполнения',
            'content.string' => 'Данные должны соотвествовать строчному типу',
            'preview_image.required' => 'Это поле обезательно для заполнения',
            'preview_image.file' => 'Неообходимо загрузить файл',
            'main_image.required' => 'Это поле обезательно для заполнения',
            'main_image.file' => 'Неообходимо загрузить файл',
            'category_id.required' => 'Это поле обезательно для заполнения',
            'category_id.integer' => 'Данные должны соотвествовать числовому типу',
            'category_id.exists' => 'Данные не найдены',
            'tag_ids.array' => 'Данные должны соотвествовать массиву',
        ];
    }
}
