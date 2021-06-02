<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use ressources\views;

class DefaultController extends Controller
{
    public function __construct()
    {
        return null;
    }

    public function show()
    {
        $user = User::where('id', $userId)->with('roles')->first();
    }
}
