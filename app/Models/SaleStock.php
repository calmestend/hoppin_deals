<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleStock extends Model
{
    protected $fillable = [
        'sale_id',
        'stock_id',
        'quantity',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
