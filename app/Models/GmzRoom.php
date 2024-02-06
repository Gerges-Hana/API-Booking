<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzRoom extends Model
{ 
    protected $table = "gmz_room";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_content','thumbnail_id','gallery','base_price','number_of_room','room_footage','number_of_bed','number_of_adult','number_of_children','room_facilities','hotel_id','author','status','created_at','updated_at','ical','deleted_at'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
'created_at' => 'datetime',
'updated_at' => 'datetime',
'deleted_at' => 'datetime',
    ];

    use HasFactory;
}

