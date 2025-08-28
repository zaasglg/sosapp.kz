<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $fillable = ["name", "description", "cover_image"];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class, "seminar_id");
    }
}
