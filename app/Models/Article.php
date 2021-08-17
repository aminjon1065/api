<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
class Article extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'title',
            'body',
            'img'
        ];

    public function User()
    {
        return $this->belongsTo(User::class, 'userId');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
