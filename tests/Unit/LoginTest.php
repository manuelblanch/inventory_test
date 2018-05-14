<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase {

  public function add_user(){

    $this->visit('mnt/provider')
    ->type('proba', 'name')
    ->type('proba2', 'shortName')
    ->type('proba3', 'description');

  }

}
