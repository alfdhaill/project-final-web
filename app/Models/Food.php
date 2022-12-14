<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'slug',
        // 'image',
        'description',
        'category_id',
        'tag_id'
    ];

    public function tag()
    {
        $this->hasMany(Tag::class);
        return $this->belongsToMany(tag::class, 'tag_id');
    }
    public function category()
    {
        $this->hasOne(category::class);
        return $this->belongsTo(category::class, 'category_id');
    }
}
