<?php

namespace Tests;

use App;
use Artisan;
use App\Brand;
use App\Http\Controllers\BrandController;
use Illuminate\Database\Connection;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\ParameterBag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Hash;

class BrandControllerTest extends BrowserKitTest
{
    /**
     * @var \Mockery\Mock|\Illuminate\Database\Connection
     */
    protected $db;
    /**
     * @var \Mockery\Mock|App\Brand
     */
    protected $brandMock;

    public function setUp()
    {
        parent::setUp();
        App::setLocale('en');
    }

    public function test_it_stores_new_brand()
    {
        $controller = new BrandController();
        $data = [
            'name' => 'Nova Marca',
        ];
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
        // Mock Validation Presence Query

        /** @var RedirectResponse $response */


    }

    public function test_it_throws_error_on_duplicate_name()
    {
        $controller = new BrandController();
        $data = [
            'name' => 'Nova Marca',
        ];

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));
    }

    public function test_edit_brand()
    {
        $cityInfo = ['id' => 1, 'name' => 'Nova Marca'];
        $controller = new BrandController();
        $view = $controller->edit($brand);

    }

    public function test_update_existing_brand()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        
        $newBrand = (new Brand())->forceFill(['id' => 1, 'name' => $data['name']]);
        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

    }

    public function test_update_throws_error_on_duplicate_name()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];
        $brand = new Brand();
        $brand->forceFill(['id' => 1, 'name' => $data['name']]);

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $request->setJson(new ParameterBag($data));

        $controller->update($request, $brand);
    }

    public function test_destroy_existing_brand()
    {
        $controller = new BrandController();
        $data = [
            'id'   => 1,
            'name' => 'Nova Marca',
        ];

        $response = $controller->destroy($brand);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('brand.index'), $response->headers->get('Location'));

    }

}
