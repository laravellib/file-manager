<?php

namespace codicastudio\Filemanager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use codicastudio\Filemanager\FilemanagerTool;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    /**
     * @param Request $request
     * @param Closure $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return app(FilemanagerTool::class)->authorize($request)
        ? $next($request)
        : abort(403);
    }
}
