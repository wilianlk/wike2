<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birthday', 'id_number', 'cellphone_number', 'genre', 'points', 'state'
    ];

    public function getBirthdayAttribute($original){
        return date('d/m/Y', strtotime($original));
    }
}
