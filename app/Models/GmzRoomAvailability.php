<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzRoomAvailability extends Model
{ 
    protected $table = "gmz_room_availability";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id','hotel_id','total_room','adult_number','child_number','check_in','check_out','number','price','booked','status','created_at','updated_at','is_base'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
'created_at' => 'datetime',
'updated_at' => 'datetime',
    ];

    use HasFactory;
}
