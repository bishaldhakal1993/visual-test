<?php

namespace App\Http\Controllers;

use App\Constants\ResponseConstants;
use App\Services\ComicService;
use Throwable;

class ComicController extends Controller
{
    /**
     * @var ComicService
     */
    private $comicService;

    /**
     * Create a new ComicController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->comicService = new ComicService();
    }

    /**
     * Retrieves all the comics by Author.
     *
     * @param bigint $authorId
     *
     * @return json
     */
    public function getByAuthor($authorId)
    {
        try {
            $comics = $this->comicService->getComicsByAuthor($authorId);

            if ($comics->count() < 1) {
                return response()->json(ResponseConstants::NO_RECORD_FOUND, 200);
            }

            return response()->json($comics, 200);
        } catch (Throwable $e) {
            return response()->json(ResponseConstants::ERROR_MESSAGE_500, 500);
        }
    }


}
