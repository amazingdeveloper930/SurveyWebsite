<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    //
    protected $table = 'occupations';

    public function usersOfOccupation()
    {
        return $this->hasMany('App\User', 'occupation', 'id');
    }
}
