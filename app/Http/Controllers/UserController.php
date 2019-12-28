<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getData($id)
    {
        $user = User::findOrFail($id);
        return $user->freeTimeRemaining($user->start_date, $user->part_time);
    }
}
