<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Stars extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function product(){
        return $this->belongsTo(Product::class);
    }

    protected function user(){
        return $this->belongsTo(User::class);
    }
}
