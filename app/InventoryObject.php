<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryObject extends Model
{
    protected $table = 'inventory';
    public $fillable = ['id', 'public_id', 'name', 'description', 'material_type_id', 'brand_id', 'model_id', 'location_id', 'quantity', 'price', 'moneysourceId',
        'date_entrance', 'last_update', 'picture'];
}
