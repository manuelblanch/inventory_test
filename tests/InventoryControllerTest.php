<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InventoryControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;
    public function testIndex()
    {
        //dd(route('studies.index'));
        $studies = factory(\Scool\Inventory\Models\Study::class,50)->make();
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $this->get('studies')->dump();
        $this->response->dump();
        $this->assertResponseOk();

        $this->assertViewHas('studies');

        $studies = $this->response->getOriginalContent()->getData()['studies'];

        $this->assertInstanceOf(Illuminate\Database\Eloquent\Collection::class, $studies);

        //1) Preparació
        //2) Execució
        //3) Assertions
    }

    public function testIndexNotLoggued(){
        $this->get('studies');
        $this->assertResponseOk();
    }

    public function testStore() {

        $this->login();
        $this->post('studies');
        $this->assertRedirectedToRoute('studies.create');
    }

    protected function login(){
        
    }


}
