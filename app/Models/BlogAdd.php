<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAdd extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function rel_to_user(){
        return $this->belongsTo(UserLogin::class, 'user_id');
    }
    public function rel_to_category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
   
}
