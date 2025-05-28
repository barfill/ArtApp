<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    // Tworze Accessor, ktory pozwala na tworzenie wirtualnych atrybutow
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
