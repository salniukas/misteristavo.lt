<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'name', 'description', 'type','project_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'gifts_user','user_id','gift_id')->withPivot('isUsed', 'id', 'username')->withTimestamps();
    }
}
