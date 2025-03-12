<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'capacity'];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
