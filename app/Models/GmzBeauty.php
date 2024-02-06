<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzBeauty extends Model
{ 
    protected $table = "gmz_beauty";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','enable_cancellation','cancel_before','cancellation_detail','quantity','rating','is_featured','video','service','available_space','service_starts','service_ends','service_duration','branch','day_off_week','author','status','created_at','updated_at','external_booking','external_link','post_description','deleted_at'
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

