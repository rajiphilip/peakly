<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return $user != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'property_name' => ['required'],
            'description' => ['required'],
            'unit_price' => ['required', 'numeric'],
            'total_no_of_units' => ['required', 'numeric'],
            'available_units' => ['required', 'numeric'],
            'units_sold' => ['required', 'numeric'],
            'brochure' => ['required', 'file', 'mimes:doc,pdf,docx'],
            'image.*' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }
}
