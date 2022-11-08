<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'title' => ['required'],
                'document' => ['required', File::types(['mp3', 'pdf', 'mp4', 'mov'])],
                'image' => ['required', File::image()->atLeast(2 * 1024)->smallerThan(5 * 1024)->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))],
            ];
        } else {
            return [
                'title' => ['sometimes', 'required'],
                'document' => ['sometimes', 'required', File::types(['mp3', 'pdf', 'mp4', 'mov'])],
                'image' => ['sometimes', 'required', File::image()->atLeast(2 * 1024)->smallerThan(5 * 1024)->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500))],
            ];
        }
    }
}
