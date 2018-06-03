<?php

namespace Tests\Unit;

use App\MoneySource;

class MoneySourceControllerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testcreate()
    {
        $moneySource = MoneySource::create([
        'name'        => 'Elena',
        'shortName'   => 'El',
        'description' => 'Noia',
    ]);
        $this->assertEquals($moneySource->fullname, 'Elena, El, Noia');
        $moneySource = MoneySource::create([
        'shortName'   => 'El',
        'description' => 'Noia',
    ]);
        $this->assertEquals($moneySource->fullname, 'El, Noia');
    }

    public function testedit()
    {
    }

    public function testdelete()
    {
    }
}
