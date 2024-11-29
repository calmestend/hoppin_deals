<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'client_id',
        'payment_id',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function saleStocks()
    {
        return $this->hasMany(SaleStock::class);
    }
}
