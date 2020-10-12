<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public  $fillable = [
        'visitors_id',
        'ip_address',
        'name',
        'phone',
        'shipping_address',
        'email',
        'message_note',
        'is_paid',
        'is_complete',
        'seen_by_admin'
    ];

    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }

}
