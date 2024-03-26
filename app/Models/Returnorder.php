<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returnorder extends Model
{
    protected $table =  'returnorders' ; 
    
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }
}
