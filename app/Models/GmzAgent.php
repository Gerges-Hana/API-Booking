<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzAgent extends Model
{ 
    protected $table = "gmz_agent";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title','post_content','location_address','thumbnail_id','gallery','rating','is_featured','video','post_type','author','status','created_at','updated_at'
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

