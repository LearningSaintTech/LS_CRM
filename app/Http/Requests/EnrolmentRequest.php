<?php

namespace App\Http\Requests;

use App\Models\Enrolment;
use App\Models\Vendor;
use Clue\Redis\Protocol\Model\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrolmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $enrolment_id = $this->input('id');
        // dd($enrolment_id);
        return [
            'student_name' => ['required', 'string', 'max:255'],
            'email' => [
                'nullable',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(Enrolment::class)->ignore($enrolment_id),
            ],
            'vendor_id' => ['required','string' ,'max:20'],
            'vendor_user_id' => ['nullable' , 'max:20'],
            'address' => ['nullable' ,'max:1025'],
            'course_name' => ['nullable' ,'max:225'],
            'phone' => ['nullable' ,'max:12'],
            'profile' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
