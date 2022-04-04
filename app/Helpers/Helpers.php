<?php
namespace App\Helpers;
// use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Route;
use App\User;

class Helpers {

    public static function get_username($user_id) {
        $user = DB::table('users')->where('id', $user_id)->first();

        return (isset($user->email) ? $user->email : '');
    }

    // public static function isActiveRoute($route, $output = "active")
    // {

    //     if (Route::currentRouteName() == $route) return $output;
    // }

    public static function isActiveRoute($route, $output = "active")
    {

        if (Route::currentRouteName() == $route) return $output;
    }
}
