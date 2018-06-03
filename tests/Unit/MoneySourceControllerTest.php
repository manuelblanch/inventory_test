<?php

namespace Tests\Unit;
use App\MoneySource;
use App\User;
use Config;
use Illuminate\Contracts\Console\Kernel;
use Tests\TestCase;


class MoneySourceControllerTest extends \PHPUnit_Framework_TestCase
{

protected function setUp()
{
    parent::setUp();
    
}
public function test1()
{
    $moneySource = MoneySource::create([
        'name' => 'Elena',
        'shortName' => 'El',
        'description' => 'Noia'
    ]);
    $this->assertEquals($moneySource->fullname,'Elena, El, Noia');
    $moneySource = MoneySource::create([
        'shortName' => 'El',
        'description' => 'Noia',
    ]);
    $this->assertEquals($moneySource->fullname,'El, Noia');
}
}
