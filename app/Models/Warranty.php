<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;
    protected $table = "warranties";
    protected $guard = [];
    protected $fillable = [
        'product_id','title','content','price','image','description'
    ];
   
    public function product(){
        // return $this->belongsTo(Product::class,"product_id","id");
        return $this->hasOne(Product::class,'id','warranty');
    }
}
