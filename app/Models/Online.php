<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
