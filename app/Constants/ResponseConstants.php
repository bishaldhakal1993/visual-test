<?php

namespace App\Constants;

class ResponseConstants
{
    // General Constants.
    const NO_RECORD_FOUND = 'No record found.';
    const RECORD_DELETED = 'Record Deleted.';

    // Error Constants.
    const ERROR_MESSAGE_400 = 'Bad request (something wrong with URL or parameters)';
    const ERROR_MESSAGE_401 = 'Not authorized (not logged in)';
    const ERROR_MESSAGE_403 = 'Logged in but access to requested area is forbidden';
    const ERROR_MESSAGE_404 = 'Not Found (page or other resource doesn’t exist)';
    const ERROR_MESSAGE_422 = 'Unprocessable Entity (validation failed)';
    const ERROR_MESSAGE_500 = 'Internal Server Error.';
}
