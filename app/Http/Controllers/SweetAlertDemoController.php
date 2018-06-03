<?php

namespace App\Http\Controllers;

use Alert;

class SweetAlertDemoController extends Controller
{
    public function index($alertType = null)
    {
        switch ($alertType) {
            case 'info':
                Alert::info('Welcome', 'Demo info alert');
                break;

            case 'success':
                Alert::success('Welcome', 'Demo success alert');
                break;

            case 'error':
                Alert::error('Welcome', 'Demo error alert');
                break;

            case 'warning':
                Alert::warning('Welcome', 'Demo warning alert');
                break;

            case 'success_autoclose':
                Alert::success('Welcome', 'Demo success alert')->autoclose(3500);
                break;

            case 'confirmation':
                Alert::success('Welcome', 'Demo success alert')->persistent('Ok');
                break;

            default:
                Alert::message('Robots are working!');
                break;
        }

        return view('sweetalertdemo');
    }
}
