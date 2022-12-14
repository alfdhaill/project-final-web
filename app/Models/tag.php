<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'admin_id',
    ];

    public function food()
    {
        return $this->hasMany(Food::class);
    }
    public function admin()
    {
        $this->hasOne(user::class);
        return $this->belongsTo(user::class, 'admin_id');
    }
}
