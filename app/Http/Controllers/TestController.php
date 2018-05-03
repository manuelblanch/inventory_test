<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TestController extends Controller {

    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Design New Dashboard',
                        'progress' => '87',
                        'color' => 'danger'
                ],
                [
                        'name' => 'Create Home Page',
                        'progress' => '76',
                        'color' => 'warning'
                ],
                [
                        'name' => 'Some Other Task',
                        'progress' => '32',
                        'color' => 'success'
                ],
                [
                        'name' => 'Start Building Website',
                        'progress' => '56',
                        'color' => 'info'
                ],
                [
                        'name' => 'Develop an Awesome Algorithm',
                        'progress' => '10',
                        'color' => 'success'
                ]
        ];
        return view('test')->with($data);

        if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
        // Ignores notices and reports all other kinds... and warnings
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
    }
    
    }

    public function update(Request $request)
   {




       $path = Storage::putFileAs(
    'avatars', $request->file('avatar'), $request->user()->id
);

 return $path;
   }

}
