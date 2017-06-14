<?php

namespace App;

use App\Events\InventoryCreated;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
  * The attributes that aren't mass assignable.
  *
  * @var array
  */
 protected $guarded = array();

    /**
     * A task belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(Inventory::class, 'id');
    }
}
