<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'image',
        'category_id',
        'provider_id',
        'price_buy',
        'price_sale',
        'note'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        $image = $this->image;
        $year = substr($image, 0, 4);
        $month = substr($image, 4, 2);
        $day = substr($image, 6, 2);
        
        return config('filesystems.disks.s3.url') . "images/$year/$month/$day/" . $image;
    }
}
