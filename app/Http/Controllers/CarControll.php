<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CarControll extends Controller
{
    public function listCars($option = '', $value = '')
    {
        if (!empty($option) && $option != 'cena') {

            if ($option != '') {

                $cars = Car::with(['photo'])->where($option, $value)->where('status', '!=', 'Sold')->orderByDesc('id')->paginate(10);

            }

        } else {
            if ($option == 'cena') {

                if (isset($_GET['min_val']) && isset($_GET['max_val'])) {
                    setcookie('min_val', $_GET['min_val']);
                    setcookie('max_val', $_GET['max_val']);
                    $min = $_GET['min_val'];
                    $max = $_GET['max_val'];

                } elseif (isset($_COOKIE['min_val']) && isset($_COOKIE['max_val'])) {
                    $min = $_COOKIE['min_val'];
                    $max = $_COOKIE['max_val'];
                }


                $cars = Car::with(['photo'])->where('status', '!=', 'Sold')->where('price', '>=', $min)->where('price', '<=', $max)->orderBy('price', 'ASC')->paginate(10);
            } else {
                $cars = Car::where('status', '!=', 'Sold')->orderByDesc('id')->paginate(10);
//                $cars = Cache::remember('CarsForMainPage', 1140, function () {
//                    return Car::with(['photo'])->where('status', '!=', 'Sprzedany')->paginate(10);
//                });
            }
        }
        //	dd($cars);
        $makes = $this->searchOptions('make');
        $gearbox = $this->searchOptions('gearbox');
        $price = $this->searchOptions('price');

        return view('mods.listCars', [
            'cars' => $cars,
            'hero' => __('messages.cars_list'),
            'makes' => $makes,
            'gearbox' => $gearbox,
            'price' => $price
        ]);
    }

    public function searchOptions($option)
    {
        if ($option == 'make') {
            return Cache::remember('searchOptions-make', 1140, function () {
                return Car::all('make')->groupBy('make');
            });
        }
        if ($option == 'gearbox') {
            return Cache::remember('searchOptions-gearbox', 1140, function () {
                return Car::all('gearbox')->groupBy('gearbox');
            });
        }
        if ($option == 'price') {
            $max = Cache::remember('searchOptions-price-max', 1140, function () {
                return DB::table('cars')->max('price');
            });
            $min = Cache::remember('searchOptions-price-min', 1140, function () {
                return DB::table('cars')->min('price');
            });
            $diff = $max - $min;
            $step = $diff / 8;
            $res['min'] = round($min - 1000, -3);
            $res['max'] = round($max + 1000, -3);
            $res['step'] = round($step, -3);
            return $res;
        }
    }

    public function showCar($carId)
    {
        $car = Cache::remember('carOne' . $carId, 1140, function () use ($carId) {
            return Car::with(['photo'])->where('id', $carId)->get();
        });
        if (count($car) == 0) {
            return redirect()->route("home");
        } else {
            $similar = $this->getSimilarCars(Car::find($carId));


            return view('mods.onecar', ['car' => $car[0], 'hero' => __('messages.car_details'), 'similar' => $similar]);
        }
    }

    public function getSimilarCars(Car $car)
    {
        return Cache::remember('similars' . $car->id, 1140, function () use ($car) {
            return Car::where('make', 'LIKE', '%' . $car->make . '%')->orWhere('model', 'LIKE', '%' . $car->model . '%')->limit(6)->get();
        });
    }

}
