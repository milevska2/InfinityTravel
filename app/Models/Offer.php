<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['accommodation_id', 'dates', 'price'];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

}
