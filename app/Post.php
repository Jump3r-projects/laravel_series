<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    // protected $table = 'posts'; #change the name of db
    //Primary key
    public $primaryKey = 'id';  
    
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }

}
