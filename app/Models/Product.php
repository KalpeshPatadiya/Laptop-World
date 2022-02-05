<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'subcat_id',
        'name',
        'slug',
        'small_description',
        'image',
        'high_heading',
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
        'offers_pr',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'subcat_id', 'id', 'slug');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcat_id','id','slug');
    }
}
