<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalDevelopment extends Model
{
    protected $table = 'professional_development';
    
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'gallery_images',
        'pdf_file',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'gallery_images' => 'array',
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
}
