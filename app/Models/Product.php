<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Stars;

class Product extends Model
{
    use HasFactory;
    // protected fillable = [may be something here];
    protected $guarded = [];

    protected function user(){
        return $this->belongsTo(User::class);
    }
    protected function stars(){
        return $this->hasMany(Stars::class);
    }

}
