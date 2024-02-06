<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzTerm extends Model
{ 
    protected $table = "gmz_term";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
public function gmz_taxonomy()
{
return $this->hasOne(GmzTaxonomy::class,'id','taxonomy_id')->select(['id','taxonomy_title']);
}
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term_title','term_name','term_description','term_icon','term_image','term_price','taxonomy_id','created_at','updated_at','parent','term_location','author'
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

