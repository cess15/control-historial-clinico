<?php

namespace App\Exceptions;

use Exception;

class GeneralExceptionError extends Exception
{
    public function render($request)
    {
        return response()->view('errors.exception',['exception'=>$this]);
    }
}
