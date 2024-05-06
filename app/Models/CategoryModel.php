<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function rel_to_blogs()
    {
        return $this->hasMany(BlogAdd::class);
    }
}
