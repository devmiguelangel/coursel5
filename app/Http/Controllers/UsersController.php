<?php
namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller {

    public function getIndex() {
        $result = DB::table('users')
            ->select([
                'users.id',
                'first_name',
                'last_name',
                'user_profiles.id as profile_id',
                'twitter'
            ])
            ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->where('first_name', '!=', 'ssmiguel')
            ->orderBy('users.id', 'asc')
            ->get();

        return $result;
    }
}