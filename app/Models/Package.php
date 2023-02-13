<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'container_id',
        'style_no',
        'uom',
        'prefix',
        'suffix',
        'height',
        'width',
        'length',
        'weight',
        'upc',
        'size1',
        'color1',
        'size2',
        'color2',
        'size3',
        'color3',
        'carton',
    ];

    public function container()
    {
        return $this->belongsTo(Container::class);
    }
}
