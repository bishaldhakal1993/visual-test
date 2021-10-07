<?php

namespace App\Services;

use App\Constants\ResponseConstants;
use App\Models\AuthorComic;
use App\Models\Comic;

class ComicService
{
    /**
     * Retrieves all the comics by Author.
     *
     * @param $authorId
     *
     * @return Comic
     */
    public function getComicsByAuthor($authorId)
    {
        $author = AuthorService::getAuthor($authorId);

        return $author->comics()->get();
    }

    /**
     * Creates comics.
     *
     * @param array $comic
     *
     * @return Comic
     */
    public static function createComic($comic)
    {
        return Comic::updateOrCreate([
            'title' => $comic['title'],
            'series_name' => $comic['series']['name'],
        ], [
            'description' => $comic['description'],
            'page_count' => $comic['pageCount'],
            'thumbnail_url' => $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'],
        ]);
    }
}
