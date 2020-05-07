<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Campaign extends Model
{
    protected $table = 'campaigns';

    public function tags()
    {
        return $this->hasMany('App\CampaignTag');
    }

    public function questions()
    {
        return $this->hasMany('App\CampaignQuestion', 'campaign_id', 'id');
    }

    public function results()
    {
        return $this->hasMany('App\CampaignResult');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    

    public function scopeRecentPublic($query, $language_list = null)
    {

        /* $public_entries = Campaign::where('active', 1)
               ->where(function($q) {
                 $language_list = unserialize(Auth::guard('web')->user()->language_list);
                 $q->whereIn('language', $language_list)
                   ->orWhereNull('language');
               })
               ->orderBy('id', 'desc')
               ->paginate(10);
               */
        if($language_list == null)
            return $query->where('active', 1)
                ->where('public', 1)
                ->orderBy('advertise_results', 'desc')
                ->where('advertise_results', '>', 0)
                ->orderBy('id', 'desc');
        else
            return $query->where('active', 1)
                ->where('public', 1)
                ->orderBy('advertise_results', 'desc')
                ->where('advertise_results', '>', 0)
                ->orderBy('id', 'desc')
                ->whereIn('language', $language_list);
    }
}
