<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class like extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'user_id'
    ];

    public function food()
    {
        $this->hasMany(food::class);
        return $this->belongsToMany(food::class, 'food_id');
    }
    public function user()
    {
        $this->hasMany(user::class);
        return $this->belongsToMany(user::class, 'user_id');
    }
}
