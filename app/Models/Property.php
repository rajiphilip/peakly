<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable  = [
        'user_id',
        'property_name',
        'description',
        'unit_price',
        'total_no_of_units',
        'available_units',
        'units_sold',
        'status',
        'brochure',
        'image'
    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
