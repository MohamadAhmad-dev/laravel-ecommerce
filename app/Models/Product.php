<?php

namespace App\Models;

use App\Models\ProductImages;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'details',
        'price',
        'quantity',
        'image',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function images(){
        return $this->hasMany(ProductImages::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
