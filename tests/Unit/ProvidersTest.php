<?php

namespace Tests\Feature;

class ProvidersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(Providers::class)->create([
          'name'          => 'Test',
          'shortName'     => 'T1',
          'description'   => 'proba',
          'date_entrance' => '2018-12-12',
          'last_update'   => '2018-11-11',
        ]);

        $this->assertEquals('Test T1 proba 2018-12-12 2018-11-11');
    }
}
