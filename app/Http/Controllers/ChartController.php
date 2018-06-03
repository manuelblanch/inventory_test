<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Brand_Model;
use App\Location;
use App\Material_Type;
use App\MoneySource;
use App\Product;
use App\Provider;
use Charts;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        $products = Product::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart = Charts::database($products, 'bar', 'highcharts')
                  ->title('Detalls del productes')
                  ->elementLabel('Total Productes')
                  ->dimensions(1000, 500)
                  ->responsive(true)
                  ->groupByMonth(date('Y'), true);

        $location = Location::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart2 = Charts::database($location, 'bar', 'highcharts')
                        ->title('Localitzacions')
                        ->elementLabel('Numero de localitzacions')
                        ->dimensions(1000, 500)
                        ->responsive(true)
                        ->groupByMonth(date('Y'), true);

        $material_type = Material_Type::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $pie_chart = Charts::database($material_type, 'pie', 'highcharts')
                ->title('Materials')
                ->elementLabel('Total Materials')
                ->dimensions(1000, 500)
                ->responsive(true)
        ->groupByMonth(date('Y'), true);

        $brand = Brand::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $line_chart = Charts::database($brand, 'line', 'highcharts')
                ->title('Marques')
                ->elementLabel('Etiquetes de grafics')
                ->dimensions(1000, 500)
                ->responsive(true)
          ->groupByMonth(date('Y'), true);

        $moneySource = MoneySource::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $areaspline_chart = Charts::database($moneySource, 'line', 'highcharts')
                    ->title('Monetaria')
                    ->colors(['#ff0000', '#ffffff'])
            ->dimensions(1000, 500)
                ->responsive(true)
            ->groupByMonth(date('Y'), true);

        $percentage_chart = Charts::create('percentage', 'justgage')
                    ->title('Percentage Grafiques')
                    ->elementLabel('Etiquetes de grafics')
                    ->values([65, 0, 100])
                    ->responsive(true)
                    ->height(300)
                    ->width(0);

        $provider = Provider::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $area_chart = Charts::database($provider, 'area', 'highcharts')
                ->title('Proveidors')
                ->elementLabel('Etiquetes de grafics')
                ->dimensions(1000, 500)
          ->groupByMonth(date('Y'), true)
                ->responsive(true);

        $brand_model = Brand_Model::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $donut_chart = Charts::database($brand_model, 'donut', 'highcharts')
                ->title('Model de Marques')
                ->dimensions(1000, 500)
          ->groupByMonth(date('Y'), true)
                ->responsive(true);

        $geo_chart = Charts::create('geo', 'highcharts')
                          ->title('Grafic geografic')
                          ->elementLabel('Chart Labels')
                          ->labels(['US', 'UK', 'IND'])
                          ->colors(['#C5CAE9', '#283593'])
                          ->values([25, 55, 70, 90])
                          ->dimensions(1000, 500)
                          ->responsive(true);

        return view('chart', compact('chart', 'chart2', 'pie_chart', 'line_chart', 'areaspline_chart', 'percentage_chart', 'area_chart', 'donut_chart', 'geo_chart'));
    }
}
