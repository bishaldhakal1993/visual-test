<?php

namespace App\Services;

use App\Constants\ResponseConstants;
use App\Models\Author;

class AuthorService
{
    /**
     * Retrieves all the authors.
     *
     * @return Author
     */
    public function getAllAuthors()
    {
        return Author::orderBy('created_at', 'desc')->get();
    }

    /**
     * Creates authors.
     *
     * @param array $author
     *
     * @return Author
     */
    public static function createAuthor($author)
    {
        return Author::create([
            'first_name' => $author['firstName'],
            'last_name' => $author['lastName'],
            'thumbnail_url' => $author['thumbnail']['path'] . '.' . $author['thumbnail']['extension'],
        ]);
    }

    /**
     * Gets authors by author Id.
     *
     * @param bigint $authorId
     *
     * @return Author
     */
    public static function getAuthor($authorId)
    {
        return Author::find($authorId);
    }
}
