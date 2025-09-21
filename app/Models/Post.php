<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function mainImageUrl(): Attribute
    {
        return Attribute::make(
            function () {
                return 'storage/' . $this->main_image;
            }
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function getMainImageAttribute(string $value): string
//    {
//        return 'storage/' . $value;
//    }
}
