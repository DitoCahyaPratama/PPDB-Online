<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
            'nisn' => 'required',
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'nik' => 'required',
            'place_born' => 'required',
            'date_born' => 'required',
            'gender' => 'required',
            'religion_id' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
            'regency_id' => 'required',
            'province_id' => 'required',
            'phone_number' => 'required',
        ];
    }
}
