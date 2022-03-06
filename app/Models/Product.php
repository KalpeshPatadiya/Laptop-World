<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cat_id',
        'subcat_id',
        'name',
        'slug',
        'small_description',
        'image',
        'highlights',
        'des_heading',
        'description',
        'det_heading',
        'details',
        'MRP',
        'price',
        'quantity',
        'status',
        'trending',
        'new_arrivals',
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id', 'id', 'slug');
    }
}
