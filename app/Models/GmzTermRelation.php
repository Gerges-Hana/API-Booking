<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzTermRelation extends Model
{ 
    protected $table = "gmz_term_relation";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
public function gmz_term()
{
return $this->hasOne(GmzTerm::class,'id','term_id')->select(['id','term_name']);
}
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term_id','post_id','post_type','created_at','updated_at','deleted_at'
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

