<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function room(){
        return $this->hasMany(Room::class, 'id');
    }
}
