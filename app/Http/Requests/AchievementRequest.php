<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AchievementRequest extends FormRequest
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
            'name' => 'required',
            'champion' => 'required',
            'year' => 'required',
            'level' => 'required',
            'type' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
