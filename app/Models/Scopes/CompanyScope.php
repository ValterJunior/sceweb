<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class CompanyScope implements Scope
{

    protected $user;

    public function __construct(){

        $this->user = Auth::user();

    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        if( $this->user ){
            $builder->where('company_id', '=', $this->user->company_id);
        }else{
            $builder->where('company_id', '=', 0);
        }
    }
}