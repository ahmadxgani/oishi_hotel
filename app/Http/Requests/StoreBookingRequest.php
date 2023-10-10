<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date_book_start' => 'required|date|after_or_equal:today',
            'date_book_end'   => 'required|date|after:date_book_start',
            'room_type'       => 'required|exists:room_types,id',
            'nr_adults'       => 'required|number|min:1',
            'nr_children'     => 'required|number|min:0',
            'nr_rooms'        => 'required|number|min:1',
        ];
    }
}
