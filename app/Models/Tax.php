<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'taxes';
    protected $fillable = ['name', 'address', 'email'];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'taxpayer_id');
    }
}
