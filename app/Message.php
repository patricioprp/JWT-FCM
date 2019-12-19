<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'id', 'title', 'body', 'received', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('\App\User');
      }

}
