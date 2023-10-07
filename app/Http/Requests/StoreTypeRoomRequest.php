<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Validation\Rule;
// use Illuminate\Validation\Rules\File;

class StoreTypeRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required|unique:type_rooms',
            'description'       => 'required',
            'publish_rate'      => 'required|integer',
            'photos'            => 'required',
            'photos.*'          => 'image|dimensions:min_width=500,min_height=500',
            // 'photos.*'          => File::image()
            //                             ->min(1 * 1024) /** 1 mb */
            //                             ->max(15 * 1024) /** 5 mb */
            //                             ->dimensions(Rule::dimensions()->width(500)->height(500)),
        ];
    }
}
