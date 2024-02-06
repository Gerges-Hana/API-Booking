<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzHotel extends Model
{ 
    protected $table = "gmz_hotel";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','extra_services','hotel_star','hotel_logo','video','policy','checkin_time','checkout_time','min_day_booking','min_day_stay','nearby_common','nearby_education','nearby_health','nearby_top_attractions','nearby_restaurants_cafes','nearby_natural_beauty','nearby_airports','faq','enable_cancellation','cancel_before','cancellation_detail','property_type','hotel_facilities','hotel_services','rating','is_featured','author','status','created_at','updated_at','booking_form','external_booking','external_link','post_description','deleted_at'
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

