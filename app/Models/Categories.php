<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    //this relationship will only return one level of child items
    public function categories()
    {
        return $this->hasMany(Categories::class, 'category_id');
    }

    // This is method where we implement recursive relationship
    public function childCategories()
    {
        return $this->hasMany(Categories::class, 'category_id')->with('categories');
    }
}
