<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [ 'client_id' ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function wish_list_product()
    {
        return $this->hasOne(WishListProduct::class);
    }
}
