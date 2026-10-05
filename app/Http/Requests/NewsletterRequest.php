<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:newsletter_subscribers,email'],
        ];
    }

    public function messages(): array
    {
        return ['email.unique' => 'Ye email pehle se subscribed hai.'];
    }
}
