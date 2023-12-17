<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'destination_id','region','lastminute','type'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}

