<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmzOrder extends Model
{ 
    protected $table = "gmz_order";
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $boolean = 1;
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku','order_token','description','post_id','total','number','buyer','owner','payment_type','checkout_data','token_code','currency','commission','start_date','end_date','start_time','end_time','post_type','payment_status','transaction_id','status','money_to_wallet','first_name','last_name','email','phone','address','city','country','postcode','note','change_log','created_at','updated_at'
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

