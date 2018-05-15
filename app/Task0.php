<?php

namespace App;

use App\Events\TaskCreated;
use Illuminate\Database\Eloquent\Model;

class Task0 extends Model
{
    use RecordsActivity;
    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $events = [
        'created' => TaskCreated::class,
    ];

    /**
     * A task belongs to a creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
