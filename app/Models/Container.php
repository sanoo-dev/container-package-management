<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'container_no',
        'vendor',
        'measurement_system',
        'receiving',
        'datetime',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
