<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScientificResult extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'source',
        'url',
        'pdf_path',
        'published_at',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope для активных записей
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    // Scope по типу
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Accessor для типов
    public function getTypeNameAttribute()
    {
        return match($this->type) {
            'article' => 'Мақала',
            'interview' => 'Сұхбат',
            'social_media' => 'Әлеуметтік желі',
            default => 'Басқа'
        };
    }
}
