<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'neighborhood',
        'zip_code',
        'street',
        'number',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
