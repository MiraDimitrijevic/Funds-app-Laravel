<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFunds extends Model
{
    use HasFactory; 
    
    protected $fillable = [
    
        'userID',
        'fundID'
    
     ];
 
     public function user(){
        return $this->belongsTo(User::class, 'userID' );
    }

    public function fund(){
        return $this->belongsTo(Fund::class, 'fundID' );
    }
}
