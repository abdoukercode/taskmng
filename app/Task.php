<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'description',
    ];

    // relationship with User

    public function user(){
        return $this->belongsTo(User::class);
}

/**
 * Get the user Gravatar by their email address.
 *
 * @return string   
 */
public function getAvatarAttribute()
{
    return sprintf('https://www.gravatar.com/avatar/%s?s=100', md5($this->name));
}

}
