<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessTrip extends Model
{
    protected $table = "events"; // Используем существующую таблицу events

    protected $fillable = ["name", "description", "cover_image", "youtube_video_url"];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class, "event_id");
    }
}
