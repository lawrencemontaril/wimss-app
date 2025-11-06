<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    /*
    | ------------
    |  Properties
    | ------------
    */
    protected $fillable = [
        'label',
        'code',
        'message'
    ];

    /*
    | ---------------
    |  Scopes
    | ---------------
    */
    #[Scope]
    protected function search(Builder $query, $search = null)
    {
        $query->where('label', 'like', '%'.$search.'%');
    }
}
