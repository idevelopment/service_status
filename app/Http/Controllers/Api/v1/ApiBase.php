<?php

namespace App\Http\Controllers\Api\v1;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ApiBase
 * @package App\Http\Controllers\Api\v1
 */
class ApiBase extends ApiGuardController
{
    // Success codes.
    const HTTP_OK                 = 200;
    const HTTP_CREATED            = 201;
    const HTTP_ACCEPTED           = 202;
    const HTTP_NO_CONTENT         = 204;

    // Error codes.
    const HTTP_BAD_REQUEST        = 400;
    const HTTP_UNAUTHORIZED       = 401;
    const HTTP_FORBIDDEN          = 403;
    const HTTP_NOT_FOUND          = 404;
    const HTTP_METHOD_NOT_ALLOWED = 405;
    const HTTP_SERVER_ERROR       = 500;
    const HTTP_SERVICE_UNAVAILBLE = 503;
}
