<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $guarded=[
        'id',
        'created_at',
        'updated_at'
    ];
    //solo pertenece a un usuario por eso pongo solo user
    public function user(){
        return $this->belongTo(User::class);
    }
}
