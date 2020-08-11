<?php

namespace App;

use App\Models\api\v1\UserDirectoryDetail;
use App\Models\api\v1\UserFileDetail;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email', 'password', 'role_id', 'user_first_name', 'user_last_name', 'user_company', 'username'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function test(){
        return DB::table('orders')
            ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
            ->get();

    }

    /**
     * Get the user_directory_details record associated with the user.
     */
    public function directories()
    {
        return $this->hasMany(UserDirectoryDetail::class);
    }

    /**
     * Get the only root user_directory_details record associated with the user.
     */
    public function rootDirectories() {
        return $this->hasMany(UserDirectoryDetail::class)->where('parent_directory_id', 0);
    }

    /**
     * Get the user_file_details record associated with the user.
     */
    public function files()
    {
        return $this->hasMany(UserFileDetail::class);
    }

    /**
     * Get recent user_file_details record associated with the user.
     */
    public function recentFiles()
    {
        $recent_val = config('settings.recentfilefrequency');
        return $this->hasMany(UserFileDetail::class)->where('updated_at','>=',Carbon::now()->subHours((int)$recent_val));
    }
}
