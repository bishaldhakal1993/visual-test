<?php

namespace App\Http\Controllers;

use App\Constants\ResponseConstants;
use App\Services\AuthorService;
use Throwable;

class AuthorController extends Controller
{
    /**
     * @var AuthorService
     */
    private $authorService;

    /**
     * Create a new AuthorController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorService = new AuthorService();
    }

    /**
     * Retrieves all the authors.
     *
     * @return json
     */
    public function get()
    {
        try {
            $authors = $this->authorService->getAllAuthors();

            if ($authors->count() < 1) {
                return response()->json(ResponseConstants::NO_RECORD_FOUND, 200);
            }

            return response()->json($authors, 200);
        } catch (Throwable $e) {
            return response()->json(ResponseConstants::ERROR_MESSAGE_500, 500);
        }
    }
}
