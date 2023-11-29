<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'status',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '0');
    }
}