<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    /**
     * Récupère les utilisateurs possédant cette compétences.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('level');
    }

}
