<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array{
        return [
            'submitter-name' => 'your name',
            'submitter-email' => 'your email address',
            'date-needed' => 'date needed',
            'approver-name' => 'approver name',
            'vendor-name' => 'vendor name',
            'vendor-address' => 'vendor\'s address',
            'vendor-website' => 'vendor\'s website',
            'vendor-fax' => 'vendor\'s fax number',
            'contact-name' => 'vendor contact\'s name',
            'contact-email' => 'vendor contact\'s email address',
            'item.*.part-number' => 'catalog / part #',
            'item.*.description' => 'item description',
            'item.*.web-link' => 'item web link',
            'item.*.unit-price' => 'item unit price',
            'item.*.unit' => 'item unit',
            'item.*.quantity' => 'quantity to order',
            'pdf-file' => 'file upload'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'submitter-name' => ['required', 'string'],
            'submitter-email' => ['required', 'email:filter'],
            'urgent-request' => ['nullable', 'accepted'],
            'date-needed' => ['required', 'date', 'after:today'],
            'approver-name' => ['required', 'string'],
            'project-name' => ['required', 'string'],
            'vendor-name' => ['required', 'string'],
            'vendor-address' => ['required', 'string'],
            'vendor-website' => ['nullable', 'url'],
            'vendor-fax' => ['nullable', 'string'],
            'contact-name' => ['required', 'string'],
            'contact-email' => ['required', 'email:filter'],
            'item.*.part-number' => ['required', 'string'],
            'item.*.description' => ['required', 'string'],
            'item.*.web-link' => ['nullable', 'url'],
            'item.*.unit-price' => ['required', 'numeric', 'min:0'],
            'item.*.unit' => ['required', 'string'],
            'item.*.quantity' => ['required', 'numeric', 'min:0'],
            'pdf-file' => ['nullable', 'file', 'mimes:pdf']
        ];
    }
}
