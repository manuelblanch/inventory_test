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

    protected $Repository;



    use DatabaseMigrations;

    public function __construct(){
        $this->repository = Mockery::mock(studyRepository::class);
        dd("setup");
//        $this->login();
    }

    public function tearDown(){
        Mockery::close();

    }
    public function testIndex()
    {
        //dd(route('studies.index'));
        $studies = factory(\Scool\Inventory\Models\Study::class,50)->make();
        $this->login();

        $this->repository->shouldReceieve('all')->once()->andReturn(
            $this->createDummyStudies()
    );

        $this->repository->shouldReceive('pushCriteria')->once()->andReturn(


        );

//aplica al laravel important

        $this->app->Instance(StudyRepository::class, $this->repository);



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
        $this->login();

    }


}
