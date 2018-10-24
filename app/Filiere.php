<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['user_id', 'nom', 'description', 'departement'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
