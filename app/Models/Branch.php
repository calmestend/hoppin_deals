<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [ 'address_id' ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
