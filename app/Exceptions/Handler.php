<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /** @var string[] */
    protected $dontReport = [];

    /** @var string[] */
    protected $dontFlash = ['password', 'password_confirmation'];

    public function report(Exception $exception): void
    {
        parent::report($exception);
    }

    public function render($request, Exception $exception): Response
    {
        return parent::render($request, $exception);
    }
}
