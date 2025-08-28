<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SportEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'images',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'event_date',
        'event_time',
        'duration',
        'registration_deadline',
        'contact_info',
        'participants_limit',
        'participants_count',
        'entry_fee',
        'requirements',
        'prizes',
        'contact_person',
        'contact_phone',
        'contact_email',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'images' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'event_date' => 'date',
        'registration_deadline' => 'date',
        'start_time' => 'datetime:H:i',
        'entry_fee' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class, 'sport_event_id');
    }

    // Scope для активных мероприятий
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope для рекомендуемых
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('start_date', 'desc');
    }

    // Scope по типу
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Scope для предстоящих мероприятий
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now()->toDateString());
    }

    // Scope для прошедших мероприятий
    public function scopePast($query)
    {
        return $query->where('start_date', '<', now()->toDateString());
    }

    // Accessor для типов
    public function getTypeNameAttribute()
    {
        return match($this->type) {
            'tournament' => 'Турнир',
            'competition' => 'Жарыс',
            'marathon' => 'Марафон',
            'training' => 'Жаттығу',
            'championship' => 'Чемпионат',
            'festival' => 'Фестиваль',
            'workshop' => 'Шеберхана',
            default => 'Іс-шара'
        };
    }

    // Accessor для статуса
    public function getStatusAttribute()
    {
        $now = now();
        $startDate = $this->start_date;

        if ($startDate > $now->toDateString()) {
            return 'Болашақ';
        } elseif ($this->end_date && $this->end_date < $now->toDateString()) {
            return 'Аяқталған';
        } else {
            return 'Өткізілуде';
        }
    }

    // Accessor для главного изображения
    public function getMainImageAttribute()
    {
        if ($this->images && is_array($this->images) && count($this->images) > 0) {
            return asset('storage/' . $this->images[0]);
        }
        return asset('assets/images/default-sport-event.jpg');
    }

    // Проверка есть ли свободные места
    public function hasAvailableSpots()
    {
        if (!$this->participants_limit) {
            return true;
        }
        return $this->participants_count < $this->participants_limit;
    }

    // Получить количество свободных мест
    public function getAvailableSpotsAttribute()
    {
        if (!$this->participants_limit) {
            return null;
        }
        return max(0, $this->participants_limit - $this->participants_count);
    }
}
