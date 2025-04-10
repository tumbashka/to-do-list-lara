<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use hasFactory;
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeIsCompleted(Builder $query): void
    {
         $query->whereNotNull('completed_at');
    }
    public function scopeIsNotCompleted(Builder $query): void
    {
        $query->whereNull('completed_at');
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
            'completed_at' => 'datetime',
            'deadline' => 'date',
        ];
    }
}
