@extends("index")
@section("content")

    <!-- Start Body Content -->
    <div class="main" role="main">
        <div id="content" class="content full">

            <div class="container">
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger text-align-center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-4 col-sm-4 listing-form-wrapper">
                        <!-- SIDEBAR -->
                        <div class="listing-form-steps-wrapper tbssticky">

                            <!-- AD LISTING FORM STEPS -->
                            <ul class="listing-form-steps">
                                <li class="active" data-target="#listing-add-form-one" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-car"></i></span>
                                        <strong class="step-title">{{__('messages.edit_car')}}</strong>
                                        <span class="step-desc">{{__('messages.basic_info')}}</span>
                                    </a>
                                </li>
                                <li data-target="#listing-add-form-two" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-list-alt"></i></span>
                                        <strong class="step-title">{{__('messages.extras')}}</strong>
                                        <span class="step-desc">{{__('messages.extra_equipment')}}</span>
                                    </a>
                                </li>
                                <li data-target="#listing-add-form-three" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-edit"></i></span>
                                        <strong class="step-title">{{__('messages.car_details')}}</strong>
                                        <span
                                            class="step-desc">{{__('messages.mileage').', '. __('messages.colour') .', '. __('messages.price')}}</span>
                                    </a>
                                </li>
                                <li data-target="#listing-add-form-four" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-image"></i></span>
                                        <strong class="step-title">{{ucfirst(__('messages.photos'))}}</strong>
                                        <span class="step-desc">{{__('messages.as_many')}}</span>
                                    </a>
                                </li>
                                <li data-target="#listing-add-form-five" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-shopping-cart"></i></span>
                                        <strong class="step-title">{{__('messages.save')}}</strong>
                                        <span class="step-desc">{{__('messages.save_and_publish')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <!-- AD LISTING FORM -->
                        <form class="listing-add-form" method="POST" enctype="multipart/form-data"
                              action="{{route("saveCar", ['id'=>$car->id])}}">
                            <section class="listing-form-content">
                            {{csrf_field()}}
                            @method('PUT')
                            <!-- AD LISTING FORM STEP ONE -->
                                <div id="listing-add-form-one" class="tab-pane fade in active">
                                    <h3>{{__('messages.basic_info')}}</h3>
                                    <div class="lighter"><p>{{__('messages.provide_basic_info')}}</p></div>
                                    <div class="spacer-10"></div>
                                    <div class="tabs listing-step-tabs">

                                        <div class="tab-content">
                                            <!-- VEHICLE SEARCH AD LISTING -->

                                            <!-- CUSTOM VEHICLE LISTING -->
                                            <div class="tab-panel">

                                                <div class="row">
                                                    <form method="POST">
                                                        <div class="col-md-6">
                                                            <label>{{__('messages.make')}}*</label>
                                                            <input type="text" name="make" class="form-control"
                                                                   value="{{$car->make}}" required>
                                                            <label>{{__('messages.year')}}*</label>
                                                            <input type="number" name="year" class="form-control"
                                                                   value="{{$car->year}}">

                                                            <label>{{__('messages.gearbox')}}</label>
                                                            <select name="gearbox" class="form-control selectpicker">
                                                                <option
                                                                    value="{{__('messages.manual')}}" {{ ($car->gearbox == __('messages.manual') ? "selected":"") }}>
                                                                    {{__('messages.manual')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.automatic')}}" {{ ($car->gearbox == __('messages.automatic') ? "selected":"") }}>
                                                                    {{__('messages.automatic')}}
                                                                </option>
                                                            </select>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>{{__('messages.model')}}*</label>
                                                            <input type="text" name="model" class="form-control"
                                                                   value="{{$car->model}}"
                                                                   required>
                                                            <label>{{__('messages.engine_size')}}</label>
                                                            <input type="text" name="engine" class="form-control"
                                                                   value="{{$car->engine}}">
                                                            <label>{{__('messages.fuel')}}*</label>
                                                            <select name="fuel" class="form-control selectpicker">
                                                                <option
                                                                    value="{{__('messages.petrol')}}" {{ ($car->fuel == __('messages.petrol') ? "selected":"") }}>
                                                                    {{__('messages.petrol')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.petrol_lpg')}}" {{ ($car->fuel == __('messages.petrol_lpg') ? "selected":"") }}>
                                                                    {{__('messages.petrol_lpg')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.diesel')}}" {{ ($car->fuel == __('messages.diesel') ? "selected":"") }}>
                                                                    {{__('messages.diesel')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.hybrid')}}" {{ ($car->fuel == __('messages.hybrid') ? "selected":"") }}>
                                                                    {{__('messages.hybrid')}}
                                                                </option>

                                                            </select>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- AD LISTING FORM STEP TWO -->
                                <div id="listing-add-form-two" class="tab-pane fade">
                                    <h3>{{__('messages.extra_equipment')}}</h3>
                                    <div class="lighter"><p>{{__('messages.separate_with_commas')}}</p></div>
                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <br>
                                            <label for="exampleFormControlTextarea1">{{__('messages.extras')}}</label>
                                            <textarea class="form-control" name="extras"
                                                      id="exampleFormControlTextarea1"
                                                      rows="3">{{$car->extras}}</textarea>


                                        </div>
                                    </div>
                                </div>

                                <!-- AD LISTING FORM STEP THREE -->
                                <div id="listing-add-form-three" class="tab-pane fade">
                                    <h3>{{__('messages.few_more')}}</h3>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>{{__('messages.mileage')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="mileage"
                                                       value="{{$car->mileage}}">
                                                <span class="input-group-addon">{{__('messages.miles')}}</span>
                                            </div>
                                            <label>{{__('messages.colour')}}</label>
                                            <input type="text" name="color" class="form-control"
                                                   value="{{$car->color}}">
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <div class="panel panel-info price-suggestion">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{__('messages.price')}}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="input-group"><span class="input-group-addon">£</span>
                                                        <input type="number" name="price" class="form-control"
                                                               value="{{$car->price}}">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- AD LISTING FORM STEP FOUR -->
                                <div id="listing-add-form-four" class="tab-pane fade">
                                    <h3>{{__('messages.add_photos')}}</h3>
                                    <div class="lighter"><p>{{__('messages.unlimited_photos')}}</p></div>
                                    <input type="file" name="photos[]" accept="image/*" multiple="multiple">


                                    <div class="photo-container">
                                        @foreach($car->photo as $onePhoto)
                                            <div class="photo-one" id="photo-{{$onePhoto->id}}">
                                                <img src="{{asset($onePhoto->path)}}" class="admin-images" alt="...">
                                                <p><a class="btn-danger" onclick="delPhoto({{$onePhoto->id}})"
                                                      id="btn-photo-{{$onePhoto->id}}">{{__('messages.delete')}}</a></p>
                                            </div>

                                        @endforeach
                                    </div>


                                    <hr class="fw">
                                    <h3>{{__('messages.desc')}}</h3>

                                    <textarea class="form-control" rows="10"
                                              name="description">{{$car->description}}</textarea>

                                </div>

                                <!-- AD LISTING FORM STEP FIVE -->
                                <div id="listing-add-form-five" class="tab-pane fade">
                                    <h3>{{__('messages.thats_it')}}</h3>
                                    <div class="lighter"><p>{{__('messages.thats_it2')}}</p></div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">

                                            </div>
                                            <button type="submit"
                                                    class="btn btn-info">{{__('messages.save_changes')}}</button>

                                        </div>

                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
