<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_nivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'pk_id_user_nivel','fkp_rol','nivel','fkp_regional','fk_user','fk_id_user'
    ];

    protected $table = 'user_nivels';
    protected $guarded = ['pk_id_uer_nivel','created_at','updated_at'];
    protected $primaryKey = 'pk_id_user_nivel';

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'fk_id_user', 'id');
    }
}
