<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzSpace extends Model
{ 
    protected $table = "gmz_space";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','base_price','booking_form','number_of_guest','number_of_bedroom','number_of_bathroom','size','min_stay','max_stay','booking_type','extra_services','space_type','space_amenity','enable_cancellation','cancel_before','cancellation_detail','checkin_time','checkout_time','rating','is_featured','discount_by_day','video','author','status','created_at','updated_at','external_booking','external_link','post_description','ical','deleted_at'
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

