<?php

namespace Tests\Unit;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    public function testadd_user()
    {
        $this->visit('mnt/provider')
    ->type('proba', 'name')
    ->type('proba2', 'shortName')
    ->type('proba3', 'description');
    }
}
