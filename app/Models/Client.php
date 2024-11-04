<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'rfc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function wish_list()
    {
        return $this->hasOne(WishList::class);
    }
}
