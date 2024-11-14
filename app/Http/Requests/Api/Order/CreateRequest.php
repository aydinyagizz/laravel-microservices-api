<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:product,id'],
            'quantity' => ['required', 'integer'],
            'status' => ['required', 'string', 'in:created,delivered,canceled'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
