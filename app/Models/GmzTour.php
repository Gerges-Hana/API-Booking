<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzTour extends Model
{ 
    protected $table = "gmz_tour";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_slug','post_content','location_lat','location_lng','location_address','location_zoom','location_state','location_postcode','location_country','location_city','thumbnail_id','gallery','adult_price','children_price','infant_price','booking_form','group_size','duration','booking_type','external_link','extra_services','tour_type','tour_include','tour_exclude','highlight','itinerary','faq','enable_cancellation','cancel_before','cancellation_detail','rating','is_featured','video','author','status','created_at','updated_at','post_description','ical','deleted_at','package_start_date','package_end_date'
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

