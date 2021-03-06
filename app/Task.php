<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description','type_id','is_complete','user_id'];

    public function type() {
        return $this->belongsTo('\App\Type');
    }
}
