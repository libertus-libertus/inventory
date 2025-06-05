<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_id',
        'product_id',
        'quantity',
    ];

    public function retur() {
        return $this->belongsTo(Retur::class, 'retur_id');
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
