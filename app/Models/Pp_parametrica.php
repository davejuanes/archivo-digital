<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pp_parametrica extends Model
{
    use HasFactory;

    protected $primaryKey = 'pk_id_parametrica';

    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'activo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Pp_DescripcionParametrica()
    {
        return $this->hasMany('App\PpDescripcionParametrica', 'fk_id_parametrica', 'pk_id_parametrica');
    }
}
