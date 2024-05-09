<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Newjobs extends Model
{
    use HasFactory;
    // protected $first_name = 'first_name';
    // protected $last_name = 'last_name';
    // protected $email = 'email';
    // protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'email',
    // ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
