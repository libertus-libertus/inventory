<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function stockIns() {
        return $this->hasMany(StockIn::class);
    }
}
