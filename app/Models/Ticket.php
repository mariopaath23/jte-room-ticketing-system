<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'room_id', 'start_time', 'end_time', 'status'];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
