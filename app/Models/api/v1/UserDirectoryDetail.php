<?php

namespace App\Models\api\v1;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserDirectoryDetail extends Model
{
    use Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];


    //protected $guarded =[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];


    /**
     * User record associated with the user_directory_details.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Files record associated with the user_directory_details.
     */
    public function files()
    {
        return $this->hasMany(UserFileDetail::class);
    }

    /**
     * Directories associated with the user_directory_details.
     */
    public function subDirectories(){
        return $this->hasMany(UserDirectoryDetail::class, 'parent_directory_id', 'id');
    }

}
