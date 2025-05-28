<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'description',
        'speaker_id',
        'location_id'
    ];

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
