<?php
 
namespace sisOdonto\Exceptions;
 
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Redirect;
 
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        ErrorException::class,
    ];
 
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }
 
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
     public function render($request, Exception $e)
    {   
        //dd($e);
        //check if exception is an instance of ModelNotFoundException.
        //or NotFoundHttpException
 
        
        if ($e instanceof ModelNotFoundException or $e instanceof NotFoundHttpException) {
            // ajax 404 json feedback
            if ($request->ajax()) {
                return Redirect::to('inicio/inicio');
 
            }
 
            // normal 404 view page feedback
           return Redirect::to('inicio/inicio');
        }
        if ($e instanceof \ErrorException) {
 
        return Redirect::to('inicio/inicio');
        }
        if ($e instanceof \BadMethodCallException) {
            //dd('asdasda');
        return Redirect::to('inicio/inicio');
        }
        if ($e instanceof TokenMismatchException) {
        return Redirect::to('inicio/inicio');;
        }
         if ($e instanceof ErrorException) {
 
        return Redirect::to('inicio/inicio');
        }
 
        if ($e instanceof BadMethodCallException) {
            //dd('asdasda');
        return Redirect::to('inicio/inicio');
        }
 
        if ($e instanceof \NotFoundHttpException) {
            //dd('asdasda');
        return Redirect::to('inicio/inicio');
        }
        if ($e instanceof \PDOException) {
             
        return Redirect::to('/login')->with('notice','No se ha podido Conectar con la Base de Datos, Intente Nuevamente.');
        }
 
           
        return parent::render($request, $e);
    }
 
     
 
}