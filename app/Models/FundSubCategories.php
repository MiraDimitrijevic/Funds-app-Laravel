<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundSubCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categoryID',
     ];
 
     public function fundCategory(){
        return $this->belongsTo(FundCategories::class, 'categoryID' );
    }
     public function funds(){
         return $this->hasMany(Fund::class);
 
     }
}
