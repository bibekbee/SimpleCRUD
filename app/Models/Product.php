<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    // protected fillable = [may be something here];
    protected $guarded = [];

    protected function user(){
        //maybe
        return $this->belongsTo(User::class);
        //return $this->hasMany(User::class);

    }
}
