<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'recipient_name',
        'organization',
        'issued_date',
        'category',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'issued_date' => 'date',
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

    // Scope по категории
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessor для категорий
    public function getCategoryNameAttribute()
    {
        return match($this->category) {
            'course' => 'Курс',
            'seminar' => 'Семинар',
            'workshop' => 'Шеберхана',
            'conference' => 'Конференция',
            'achievement' => 'Жетістік',
            default => 'Жалпы'
        };
    }
}
