<?php

namespace TJG\Gangoy\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface MiddlewareInterface
{
    /**
     * @param  Request   $req  PSR7 request
     * @param  Response  $res PSR7 response
     * @param  callable  $next     Next middleware
     *
     * @return mixed
     */
    public function __invoke(Request $req, Response $res, callable $next);
}
