<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        "title",
        "description",
        "image_path",
        "category",
        "sort_order",
        "is_featured",
        "event_id",
        "seminar_id",
        "sport_event_id",
    ];

    protected $casts = [
        "is_featured" => "boolean",
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function scopeFeatured($query)
    {
        return $query->where("is_featured", true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where("category", $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy("sort_order")->orderBy("created_at", "desc");
    }

    public function businessTrip()
    {
        return $this->belongsTo(BusinessTrip::class, "event_id");
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class, "seminar_id");
    }

    public function sportEvent()
    {
        return $this->belongsTo(SportEvent::class, "sport_event_id");
    }
}
