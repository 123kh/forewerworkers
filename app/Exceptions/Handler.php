<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Exception) {
           
            if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException){
                return abort('404');
            }
            if ($exception->getCode() == '0' && $exception->getmessage() == 'CSRF token mismatch.') {
               return redirect()->route('login');
            }
        }

        // if ($exception instanceof \ErrorException) {
        //     return response()->view('errors.custom', [], 500);
        // }

        return parent::render($request, $exception);
    }
}
