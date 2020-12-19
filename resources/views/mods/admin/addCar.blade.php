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
                            <ul class="listing-form-steps">
                                <li class="active" data-target="#listing-add-form-one" data-toggle="tab">
                                    <a href="#">
                                        <span class="step-state"></span>
                                        <span class="step-icon"><i class="fa fa-car"></i></span>
                                        <strong class="step-title">{{__('messages.add_car')}}</strong>
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
                              action="{{route("saveCar")}}">
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
                                                                   placeholder="{{__('messages.make')}}"
                                                                   value="{{old('make')}}" required>
                                                            <label>{{__('messages.year')}}*</label>
                                                            <input type="number" max="{{date("Y")}}" name="year"
                                                                   class="form-control"
                                                                   value="{{old('year') ?? date("Y")}}">

                                                            <label>{{__('messages.gearbox')}}</label>
                                                            <select name="gearbox" class="form-control selectpicker">
                                                                <option
                                                                    value="{{__('messages.manual')}}" {{ (old("gearbox") == __('messages.manual') ? "selected":"") }}>
                                                                    {{__('messages.manual')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.automatic')}}" {{ (old("gearbox") == __('messages.automatic') ? "selected":"") }}>
                                                                    {{__('messages.automatic')}}
                                                                </option>
                                                            </select>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>{{__('messages.model')}}*</label>
                                                            <input type="text" name="model" class="form-control"
                                                                   placeholder="{{__('messages.model')}}*"
                                                                   value="{{old('model')}}"
                                                                   required>
                                                            <label>{{__('messages.engine_size')}}</label>
                                                            <input type="text" name="engine" class="form-control"
                                                                   placeholder="1.9 TDI" value="{{old('engine')}}">
                                                            <label>{{__('messages.fuel')}}*</label>
                                                            <select name="fuel" class="form-control selectpicker">
                                                                <option
                                                                    value="{{__('messages.petrol')}}" {{ (old("fuel") == __('messages.petrol') ? "selected":"") }}>
                                                                    {{__('messages.petrol')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.diesel')}}" {{ (old("fuel") == __('messages.diesel') ? "selected":"") }}>
                                                                    {{__('messages.diesel')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.petrol_lpg')}}" {{ (old("fuel") == __('messages.petrol_lpg') ? "selected":"") }}>
                                                                    {{__('messages.petrol_lpg')}}
                                                                </option>
                                                                <option
                                                                    value="{{__('messages.hybrid')}}" {{ (old("fuel") == __('messages.hybrid') ? "selected":"") }}>
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

                                    <div class="panel panel-default">
                                        <div class="panel-body">


                                            <label for="exampleFormControlTextarea1">{{__('messages.extras')}}</label>
                                            <textarea class="form-control" name="extras"
                                                      id="exampleFormControlTextarea1"
                                                      rows="3"
                                                      placeholder="{{__('messages.separate_with_commas')}}"></textarea>


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
                                                <input type="text" class="form-control" placeholder="190000"
                                                       name="mileage" value="{{old('mileage')}}">
                                                <span class="input-group-addon">{{__('messages.miles')}}</span>
                                            </div>
                                            <label>{{__('messages.colour')}}</label>
                                            <input type="text" name="color" class="form-control"
                                                   placeholder="{{__('messages.fastest_colour')}}"
                                                   value="{{old('color')}}">
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <div class="panel panel-info price-suggestion">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{__('messages.price')}}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="input-group"><span class="input-group-addon">£</span>
                                                        <input type="number" name="price" class="form-control"
                                                               placeholder="15000" value="{{old('price')}}">

                                                    </div>
                                                    {{--                                                    <p class="small">Passaty sa bezcenne</p>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- AD LISTING FORM STEP FOUR -->
                                <div id="listing-add-form-four" class="tab-pane fade">
                                    <h3>{{__('messages.add_photos')}}</h3>
                                    <div class="lighter"><p>{{(__('messages.unlimited_photos'))}}</p></div>
                                    <input type="file" name="photos[]" accept="image/*" multiple="multiple">

                                    <hr class="fw">
                                    <h3>{{__('messages.desc')}}</h3>

                                    <textarea class="form-control" rows="10" name="description"
                                              placeholder="{{__('messages.detail_desc')}}">{{old('description')}}</textarea>

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
                                                    class="btn btn-info">{{__('messages.save_and_publish')}}</button>

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
