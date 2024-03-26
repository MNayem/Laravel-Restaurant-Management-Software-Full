<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companyorder extends Model
{
    protected $table =  'companyorders' ; 
    
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }
}
