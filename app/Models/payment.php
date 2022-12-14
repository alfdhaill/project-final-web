<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'status'
    ];

    public function order()
    {
        $this->hasOne(order::class);
        return $this->belongsTo(order::class, 'order_id');
    }
}
