<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material_Type extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'material_type';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
