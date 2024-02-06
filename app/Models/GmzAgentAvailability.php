<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzAgentAvailability extends Model
{ 
    protected $table = "gmz_agent_availability";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
public function gmz_agent()
{
return $this->hasOne(GmzAgent::class,'id','post_id')->select(['id','status']);
}
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id','check_in','check_out','status','post_type','order_id','created_at','updated_at'
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

