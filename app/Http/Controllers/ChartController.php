<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Location;
use App\Material_Type;
use Charts;
use DB;

class ChartController extends Controller
{
    public function index()
    {
    	$products = Product::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($products, 'bar', 'highcharts')
			      ->title("Product Details")
			      ->elementLabel("Total Products")
			      ->dimensions(1000, 500)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);

            $location = Location::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
              $chart2 = Charts::database($location, 'bar', 'highcharts')
      			      ->title("Localitzacions")
      			      ->elementLabel("Location Products")
      			      ->dimensions(1000, 500)
      			      ->responsive(true)
      			      ->groupByMonth(date('Y'), true);

  $material_type = Material_Type::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
		$pie_chart = Charts::database($material_type, 'pie', 'highcharts')
				->title('Materials')
				->elementLabel("Total Products")
				->dimensions(1000,500)
				->responsive(true)
        ->groupByMonth(date('Y'), true);


		$line_chart = Charts::create('line', 'highcharts')
			    ->title('Line Chart Demo')
			    ->elementLabel('Chart Labels')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([15,25,50, 5,10,20])
			    ->dimensions(1000,500)
			    ->responsive(true);

		$areaspline_chart = Charts::multi('areaspline', 'highcharts')
				    ->title('Areaspline Chart Demo')
				    ->colors(['#ff0000', '#ffffff'])
				    ->labels(['Jan', 'Feb', 'Mar', 'Apl', 'May','Jun'])
				    ->dataset('Product 1', [10, 15, 20, 25, 30, 35])
				    ->dataset('Product 2',  [14, 19, 26, 32, 40, 50]);


		$percentage_chart = Charts::create('percentage', 'justgage')
				    ->title('Percentage Chart Demo')
				    ->elementLabel('Chart Labels')
				    ->values([65,0,100])
				    ->responsive(true)
				    ->height(300)
				    ->width(0);

		$geo_chart = Charts::create('geo', 'highcharts')
				    ->title('GEO Chart Demo')
				    ->elementLabel('Chart Labels')
				    ->labels(['US', 'UK', 'IND'])
				    ->colors(['#C5CAE9', '#283593'])
				    ->values([25,55,70,90])
				    ->dimensions(1000,500)
				    ->responsive(true);

		$area_chart = Charts::create('area', 'highcharts')
			    ->title('Area Chart')
			    ->elementLabel('Chart Labels')
			    ->labels(['First', 'Second', 'Third'])
			    ->values([28,52,64,86,99])
			    ->dimensions(1000,500)
			    ->responsive(true);

		$donut_chart = Charts::create('donut', 'highcharts')
			    ->title('Donut Chart')
			    ->labels(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'])
			    ->values([25,50,70,860])
			    ->dimensions(1000,500)
			    ->responsive(true);

        return view('chart',compact('chart' , 'chart2', 'pie_chart', 'line_chart', 'areaspline_chart', 'percentage_chart', 'geo_chart', 'area_chart', 'donut_chart'));
    }
}
