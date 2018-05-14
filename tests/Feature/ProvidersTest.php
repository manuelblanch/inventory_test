<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvidersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(Provider::class)->create([
          'name' => 'Test',
          'shortName' => 'T1',
          'description' => 'proba',
          'date_entrance' => Carbon::parse('2018-12-12'),
          'last_update' => Carbon::parse('2018-11-11'),
        ]);

        $this->assertEquals('Test T1 proba 2018-12-12 2018-11-11');
    }
}
