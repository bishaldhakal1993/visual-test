<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AuthorComicService;
use App\Services\AuthorService;
use App\Services\ComicService;
use App\Services\MarvelApiService;

class fetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:marvel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches data from the Marvel API.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get Authors.
        $authors = MarvelApiService::fetchResults('/creators', 10);

        foreach ($authors as $author) {
            $authorObj = AuthorService::createAuthor($author);

            // Get Comics.
            $comics = MarvelApiService::fetchResults('/creators//' . $author['id'] . '/comics');

            foreach ($comics as $comic) {
                $comicObj = ComicService::createComic($comic);

                AuthorComicService::createAuthorComic($authorObj, $comicObj);
            }
        }

        return $authors;
    }
}
