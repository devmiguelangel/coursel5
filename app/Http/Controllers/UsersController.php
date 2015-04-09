<?php
namespace app\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller {

    public function orm() {
        /*$user = User::first();
        return $user->profile->age;*/

        $users = User::select([
                'id',
                'first_name',
                'last_name'
            ])
            ->with('profile')
            ->orderBy('id', 'asc')
            ->get();

        return $users;
    }

    public function index() {
        $result = DB::table('users')
            ->select([
                'users.id',
                'first_name',
                'last_name',
                'user_profiles.id as profile_id',
                'user_profiles.twitter',
                'user_profiles.birthdate'
            ])
            ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            // ->where('first_name', '!=', 'ssmiguel')
            ->orderBy('users.id', 'asc')
            ->get();

        foreach ($result as $row) {
            $row->full_name = $row->first_name . ' ' . $row->last_name;
            $row->age = Carbon::parse($row->birthdate)->age;
        }

        return $result;
    }
}