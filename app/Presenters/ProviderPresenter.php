<?php

namespace App\Presenters;

use App\Transformers\ProviderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProviderPresenter.
 */
class ProviderPresenter extends FractalPresenter
{
    /**
     * Transformer.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProviderTransformer();
    }
}
