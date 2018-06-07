<?php

namespace Tests;

use App;
use App\Http\Controllers\LocationController;
use App\Location;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Mockery as m;
use Symfony\Component\HttpFoundation\ParameterBag;

class LocationControllerTest extends BrowserKitTest
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Location
     */
    protected $brandMock;

    public function setUp()
    {
        parent::setUp();
        App::setLocale('en');
    }

    public function test_index_returns_view()
    {
        $controller = new LocationController();
        $view = $controller->index();
        $this->assertEquals('manteniments.location.index', $view->getName());
    }

    public function test_it_stores_new_location()
    {
        $controller = new LocationController();
        $data = [
            'name' => 'Nova Localitzacio',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query

        /* @var RedirectResponse $response */
    }

    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new LocationController();
        $data = [
            'name' => 'Nova localitzacio',
        ];

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
    }

    public function test_it_fires_event_and_shows_location()
    {
        $controller = new LocationController();
        $location = new Location(['id' => 111]);
        $events = m::mock(Dispatcher::class);
        $events->shouldReceive('dispatch')->with(m::on(function ($arg) use ($location) {
            return $arg instanceof BrandShown && $arg->brand === $brand;
        }));
        $view = $controller->show($events, $location);
    }

    public function test_create_returns_view()
    {
        $controller = new LocationController();
        $view = $controller->create();
        $this->assertEquals('manteniments.location.create', $view->getName());
    }

    public function test_edit_location()
    {
        $locationInfo = ['id' => 1, 'name' => 'Nova Localitzacio'];
        $location = new Location($locationInfo);
        $controller = new LocationController();
        $view = $controller->edit($location);
    }

    public function test_update_existing_location()
    {
        $controller = new LocationController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Localitzacio',
        ];

        $newLocation = (new Location())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
    }

    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new LocationController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Localitzacio',
        ];
        $location = new Location();
        $location->forceFill(['id' => 1, 'name' => $data['name']]);

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        $controller->update($request, $location);
    }

    public function test_update_existing_location_throw_query_exception()
    {
        $controller = new LocationController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Localitzacio',
        ];

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
    }

    public function test_destroy_existing_location()
    {
        $controller = new LocationController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Localitzacio',
        ];

        $response = $controller->destroy($location);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('location.index'), $response->headers->get('Location'));
    }

    public function test_destroy_existing_location_throw()
    {
        $controller = new LocationController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Localitzacio',
        ];

        $response = $controller->destroy($brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
}
