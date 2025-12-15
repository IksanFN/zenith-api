<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use UUID;

    protected $fillable = [
        'parent_id',
        'image',
        'name',
        'slug',
        'tagline',
        'description',
    ];

    protected $casts = [
        'image' => 'string',
        'name' => 'string',
        'slug' => 'string',
        'tagline' => 'string',
        'description' => 'string',
    ];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }
}
