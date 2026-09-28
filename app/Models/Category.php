<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'image', 'features', 'is_active'];

    protected $casts = ['is_active' => 'boolean', 'price' => 'float', 'features' => 'array'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
