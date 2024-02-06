<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzAgentRelation extends Model
{ 
    protected $table = "gmz_agent_relation";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
public function gmz_agent()
{
return $this->hasOne(GmzAgent::class,'id','agent_id')->select(['id','status']);
}
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_id','post_id','post_type','created_at','updated_at'
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

