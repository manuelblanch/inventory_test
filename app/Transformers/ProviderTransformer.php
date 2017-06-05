<?php

namespace App\Transformers;

use App\Entities\Provider;
use League\Fractal\TransformerAbstract;

/**
 * Class ProviderTransformer.
 */
class ProviderTransformer extends TransformerAbstract
{
    /**
     * Transform the \Provider entity.
     *
     * @param \Provider $model
     *
     * @return array
     */
    public function transform(Provider $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
