<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishListProduct extends Model
{
    protected $fillable = [
        'stock_id',
        'wish_list_id'
    ];

    public function wish_list()
    {
        return $this->belongsTo(WishList::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

}
