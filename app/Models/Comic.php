<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $table = 'comics';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'series_name',
        'description',
        'page_count',
        'thumbnail_url',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_comics', 'comic_id', 'author_id');
    }
}
