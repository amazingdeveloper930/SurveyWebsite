<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialShare extends Model
{
    //
 	protected $table = 'users_socialshare';

    protected $fillable = [
        'user_id', 'socialsite', 'paid_status', 'paid_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
