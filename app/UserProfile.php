<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	public function getAgeAttribute() {
        return Carbon::parse($this->birthdate)->age;
    }

}
