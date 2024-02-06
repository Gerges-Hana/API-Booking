<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzEarnings extends Model
{ 
    protected $table = "gmz_earnings";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','total','balance','net_earnings','created_at','updated_at'
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

