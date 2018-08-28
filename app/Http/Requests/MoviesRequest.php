<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class MoviesRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'title' => [
                'required',
                Rule::unique('movies')->where('releaseDate', $request['releaseDate'])
            ],
            'releaseDate' => 'required',
            'director' => 'required', 
            'duration'  => 'required|numeric|min:2|max:500',
            'imageUrl' => 'url'
        ];
    }
}
