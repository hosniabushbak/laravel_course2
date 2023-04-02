<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table ='products';
    protected $fillable = ['name', 'status', 'price', 'date', 'image'];
//    protected $hidden = ['created_at', 'updated_at'];

    protected static function booted()
    {
        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', 1);
        });
    }

//
//    public function scopeStatus($q) {
//        return $q->where('status', 1);
//    }

}
