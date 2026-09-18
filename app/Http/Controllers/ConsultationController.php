<?php

namespace App\Http\Controllers;

use App\Mail\ConsultationReceived;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ConsultationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'partner_name' => ['nullable', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:60'],
            'nationality' => ['nullable', 'string', 'max:120'],
            'preferred_date' => ['nullable', 'date'],
            'guests' => ['nullable', 'integer', 'min:0', 'max:500'],
            'looking_for' => ['required', Rule::in([
                'legal',
                'ceremony',
                'full',
                'documents',
                'unsure',
            ])],
            'message' => ['nullable', 'string', 'max:4000'],
        ]);

        $consultation = Consultation::create($data);

        $notify = config('site.email');

        if (is_string($notify) && $notify !== '' && config('mail.default') !== 'log') {
            Mail::to($notify)->send(new ConsultationReceived($consultation));
        }

        return response()->json([
            'ok' => true,
            'message' => "We've got it.",
        ]);
    }
}
