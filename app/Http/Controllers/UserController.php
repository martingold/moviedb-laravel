<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{

    public function list()
    {
        return view('user/list', [
            'users' => User::all(),
        ]);
    }

}
