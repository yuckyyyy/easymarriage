<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'name',
        'partner_name',
        'email',
        'phone',
        'nationality',
        'preferred_date',
        'guests',
        'looking_for',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'preferred_date' => 'date',
        ];
    }
}
