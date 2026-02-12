<?php

namespace App\Http\Requests;

use App\Models\Enrolment;
use App\Models\Vendor;
use Clue\Redis\Protocol\Model\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_name' => ['required', 'string', 'max:355'],
            'vendor_id' => ['required','string' ,'max:20'],
            'vendor_user_id' => ['nullable' , 'max:20'],
            'course_name' => ['nullable' ,'max:325'],
            'rating' => ['required' , 'string'],
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
