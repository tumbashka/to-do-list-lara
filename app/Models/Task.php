<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'completed_at',
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'timestamp',
            'deadline' => 'date',
        ];
    }
}
