<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
    'taxpayer_id',
    'payer_name',
    'business_name',
    'amount',
    'payment_method',
    'payment_date',
];


    public function taxpayer()
    {
        return $this->belongsTo(Tax::class, 'taxpayer_id');
    }
}
