<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 
        'product_id', 
        'reference_code', 
        'user_id',
        'quantity', 
        'notes', 
        'stock_in_date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
