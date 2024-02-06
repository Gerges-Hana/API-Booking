<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzSeo extends Model
{ 
    protected $table = "gmz_seo";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id','post_type','seo_title','meta_description','seo_image_facebook','seo_title_facebook','meta_description_facebook','seo_image_twitter','seo_title_twitter','meta_description_twitter','created_at','updated_at','deleted_at'
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

