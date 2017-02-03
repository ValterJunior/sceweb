<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Helpers\DateHelper;

class User extends Eloquent implements \Illuminate\Contracts\Auth\Authenticatable,
                                       \Illuminate\Contracts\Auth\CanResetPassword
{
    use Authenticatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function getTextCreationDate(){

        if($this->created_at){
            return DateHelper::getMonthText( $this->created_at ) . ' de ' . $this->created_at->format('Y');
        }else{
            return '';
        }

    }
    
}
