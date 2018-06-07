<?php

namespace Tests;

use App;
use App\Http\Controllers\ProviderController;
use App\Provider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ParameterBag;

class ProviderControllerTest extends BrowserKitTest
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Provider
     */
    protected $providerMock;

    public function setUp()
    {
        parent::setUp();
        App::setLocale('en');
    }

    public function test_it_stores_new_provider()
    {
        $controller = new ProviderController();
        $data = [
            'name' => 'Nou Proveidor',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        /* @var RedirectResponse $response */
    }

    public function test_create_returns_view()
    {
        $controller = new ProviderController();
        $view = $controller->create();
        $this->assertEquals('manteniments.providers.create', $view->getName());
    }

    public function test_edit_provider()
    {
        $providerInfo = ['id' => 1, 'name' => 'Nou Proveidor'];
        $provider = new Provider($providerInfo);
        $controller = new ProviderController();
        $view = $controller->edit($provider);
    }

    public function test_destroy_existing_provider()
    {
        $controller = new ProviderController();
        $data = [
            'id'   => 1,
            'name' => 'Nou Proveidor',
        ];

        $response = $controller->destroy($provider);
        $this->assertInstanceOf(RedirectResponse::class, $response);
    }
}
