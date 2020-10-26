<?php

namespace App\Models;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];


    public function store() {

        return $this->belongsTo(Store::class);
    }

    public function categories() {

        return $this->belongsToMany(Category::class);
    }
}


// Como se lê: O Produto pertence a muitas Categorias