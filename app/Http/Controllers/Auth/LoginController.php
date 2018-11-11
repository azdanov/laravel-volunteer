<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /** @var string */
    protected $redirectTo = '/';

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
