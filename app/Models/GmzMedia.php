<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzMedia extends Model
{ 
    protected $table = "gmz_media";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'media_title','media_name','media_url','media_path','media_description','media_size','media_type','author','created_at','updated_at'
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

