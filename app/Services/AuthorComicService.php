<?php

namespace App\Services;

use App\Models\AuthorComic;

class AuthorComicService
{
    /**
     * Creates author_comic record.
     *
     * @param Author $authorObj
     * @param Comic $comicObj
     *
     * @return AuthorComic
     */
    public static function createAuthorComic($authorObj, $comicObj)
    {
        return AuthorComic::firstOrCreate([
            'author_id' => $authorObj->id,
            'comic_id' => $comicObj->id,
        ]);
    }
}
