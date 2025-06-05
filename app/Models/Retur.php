<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;

    protected $table = 'returs';
    protected $fillable = [
        'return_type',
        'reference_code',
        'user_id',
        'supplier_id',
        'customer_id',
        'notes',
        'return_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function returDetails() {
        return $this->hasMany(ReturDetail::class);
    }
}
