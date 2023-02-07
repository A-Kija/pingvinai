<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // public function getOrder_jsonAttribute($value)
    // {
    //     return json_decode($value);
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
