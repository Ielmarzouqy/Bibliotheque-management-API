<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','author','isbn','location','pages','content','category_id','collection_id','status_id','user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    
    public function status(){
        return $this->belongsTo(Status::class);
    }

  
     public function user(){
         return $this->belongsTo(User::class);
     }
   
}
