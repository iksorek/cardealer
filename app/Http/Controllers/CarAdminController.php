<?php

namespace App\Http\Controllers;

use App\Car;
use App\Photo;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

//use http\Env\Request;

class CarAdminController extends Controller
{
    use ValidatesRequests;

    public function __construct()
    {
        if (!Auth::check()) {
            redirect()->route("home");
        }
        Cache::flush();


    }

    public function index()
    {
        if (!isset($_GET['order'])) {
            $order = 'id';
        } else {
            $order = $_GET['order'];
        }

        $cars = Car::with(['photo'])->orderBy($order, 'DESC')->paginate(10);
        return view("mods.admin.listAdminCars", ['cars' => $cars, 'hero' => __('messages.admin_panel')]);
    }

    public function deleteCar($id)
    {
        $car = Car::find($id);
        if ($car->status != 'Sold') {
            $this->flashMsg('danger', __('messages.delete_only_sold'));
        } else {
            $car->delete();
            $this->flashMsg('warning', __('messages.car_deleted'));
        }
        return redirect()->back();

    }

    public function statusCar($id, $status)
    {
        $car = Car::find($id);
        $car->status = $status;
        $car->save();
        $this->flashMsg('alert-warning', "$car->make $car->model " . __('messages.car_status_changed') . $car->status);
        return redirect()->back();
    }

    public function addCar()
    {

        return view("mods.admin.addCar", ['hero' => __('messages.add_car')]);
    }


    public function saveCar(Request $request, $id = null)
    {
        // dd($request);
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'numeric',
            'mileage' => 'numeric',
            'price' => 'numeric',
            'description' => 'required'
        ]);
        if ($id == null) {
            $newCar = new Car;
        } else {
            $newCar = Car::find($id);
        }

        $newCar->user_id = Auth::id();
        $newCar->make = ucfirst(strtolower($request->input('make')));
        $newCar->model = ucfirst(strtolower($request->input('model')));
        $newCar->year = $request->input('year');
        $newCar->gearbox = $request->input('gearbox');
        $newCar->engine = $request->input('engine');
        $newCar->fuel = $request->input('fuel');
        $newCar->mileage = $request->input('mileage');
        $newCar->color = $request->input('color');
        $newCar->price = $request->input('price');
        $newCar->description = $request->input('description');
        $newCar->extras = $request->input('extras');

        $newCar->save();

        $coutnPhotos = 0;
        if ($request->hasFile('photos')) {
            $coutnPhotos = count($request->file('photos'));
            $main = 1;
            foreach ($request->file('photos') as $onePhoto) {
                $path = $onePhoto->store('carPhotos/' . $newCar->id, 'public');
                $pic = new Photo;
                $pic->car_id = $newCar->id;
                $pic->is_main = $main;
                $main = 0;
                $pic->path = 'storage/' . $path;
                $pic->save();
            }
        }
        if ($id == null) {
            $this->flashMsg('alert-info', __('messages.car_added') . ": $newCar->make $newCar->model " . __('messages.and') . $coutnPhotos . __('messages.photos'));
            return redirect()->route('adminHome');
        } else {
            $this->flashMsg('alert-info', __('messages.changes_saved'));
            return redirect()->route('editCar', ['id' => $id]);
        }

    }

    public function editCar($carID)
    {
        $car = Car::with(['photo'])->find($carID);
//dd($car->option);

        return view("mods.admin.EditCar", ['car' => $car, 'hero' => __('messages.add_car')]);

    }

    public function deletePhoto($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        $this->flashMsg('warning', __('messages.photo_deleted'));
        return redirect()->back();

    }
}
