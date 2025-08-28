<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Science extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'docuent_link'];
}
