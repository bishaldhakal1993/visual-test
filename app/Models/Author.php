<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'thumbnail_url',
    ];

    public function comics()
    {
        return $this->belongsToMany(Comic::class, 'author_comics', 'author_id', 'comic_id');
    }
}
