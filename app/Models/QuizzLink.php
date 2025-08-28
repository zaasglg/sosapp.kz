<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizzLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image', 'url'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
        'url' => 'string',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array
     */
    protected $appends = [];
    /**
     * The attributes that should be used for date casting.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * The attributes that should be used for date casting.
     *
     * @var array
     */
    protected $dateFormat = 'Y-m-d H:i:s';

}
