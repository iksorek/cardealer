@extends("index")
@section("content")
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <!-- Vehicle Details -->
                <article class="single-vehicle-details">
                    <div class="single-vehicle-title">
                        <span class="badge-premium-listing">{{$car->status}}</span>
                        <h2 class="post-title">{{$car->make}} {{$car->model}} </h2>
                    </div>
                    <div class="single-listing-actions">
                        <div class="btn btn-info price">£{{$car->price}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="single-listing-images">
                                <div class="featured-image format-image">
                                    <a href="{{asset($car->photo->first()->path ?? 'images/no-foto.jpg')}}"
                                       data-rel="prettyPhoto[gallery]"
                                       class="media-box">
                                        <img src="{{asset($car->photo->first()->path ?? 'images/no-foto.jpg')}}"
                                             alt=""></a>

                                </div>
                                <div class="additional-images">
                                    <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes"
                                        data-single-item="no" data-items-desktop="4" data-items-desktop-small="4"
                                        data-items-tablet="3" data-items-mobile="3">
                                        @if(count($car->photo) > 0)
                                            @foreach($car->photo as $onePhoto)
                                                <li class="item format-image"><a
                                                        href="{{asset($onePhoto->path)}}"
                                                        data-rel="prettyPhoto[gallery]" class="media-box"><img
                                                            src="{{asset($onePhoto->path)}}"
                                                            alt="{{$car->make}} {{$car->model}} photo"></a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="sidebar-widget widget">
                                <ul class="list-group">
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.year')}}</span> {{$car->year}}</li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.make')}}</span> {{$car->make}}</li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.model')}}</span> {{$car->model}}</li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.mileage')}}</span> {{$car->mileage}}
                                    </li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.gearbox')}}</span>{{$car->gearbox}}</li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('Engine size')}}</span> {{$car->engine}}</li>
                                    <li class="list-group-item"><span
                                            class="badge">{{__('messages.fuel')}}</span> {{$car->fuel}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="spacer-50"></div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab"
                                                          href="#vehicle-overview">{{__('messages.desc')}}</a></li>
                                    {{--									<li><a data-toggle="tab" href="#vehicle-specs">Specyfikacja</a></li>--}}
                                    <li><a data-toggle="tab"
                                           href="#vehicle-add-features">{{__('messages.equipment')}}</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in active">
                                        <p>{{$car->description}}</p>
                                    </div>
                                    {{--									<div id="vehicle-specs" class="tab-pane fade">--}}
                                    {{--										<div class="accordion" id="toggleArea">--}}
                                    {{--											<div class="accordion-group panel">--}}
                                    {{--												<div class="accordion-heading togglize">--}}
                                    {{--													<a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseOne"> Engine--}}
                                    {{--														<i class="fa fa-plus-circle"></i> <i--}}
                                    {{--																class="fa fa-minus-circle"></i> </a></div>--}}
                                    {{--												<div id="collapseOne" class="accordion-body collapse">--}}
                                    {{--													<div class="accordion-inner">--}}
                                    {{--														<table class="table-specifications table table-striped table-hover">--}}
                                    {{--															<tbody>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Engine type</td>--}}
                                    {{--																<td>SKYACTIV-G 2.5 L DOHC 16-valve 4-cylinder engine--}}
                                    {{--																	with VVT--}}
                                    {{--																</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Displacement</td>--}}
                                    {{--																<td>2,488 cc</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Compression ratio</td>--}}
                                    {{--																<td>13.0:1</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Horsepower SAE net</td>--}}
                                    {{--																<td>184 @ 5,700 rpm</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Torque SAE net lb. ft.</td>--}}
                                    {{--																<td>185 @ 3,250 rpm</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Fuel system</td>--}}
                                    {{--																<td>Direct injection</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Recommended fuel</td>--}}
                                    {{--																<td>Regular</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Fuel economy city/highway (L/100--}}
                                    {{--																	km)*<br/>Manual<br/>Automatic--}}
                                    {{--																</td>--}}
                                    {{--																<td>8.1/5.3<br/>7.6/5.1</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Curb weight (kg)<br/> Manual<br/>Automatic</td>--}}
                                    {{--																<td>1,442<br/>1,465</td>--}}
                                    {{--															</tr>--}}
                                    {{--															</tbody>--}}
                                    {{--														</table>--}}
                                    {{--													</div>--}}
                                    {{--												</div>--}}
                                    {{--											</div>--}}
                                    {{--											<div class="accordion-group panel">--}}
                                    {{--												<div class="accordion-heading togglize"><a class="accordion-toggle"--}}
                                    {{--												                                           data-toggle="collapse"--}}
                                    {{--												                                           data-parent="#"--}}
                                    {{--												                                           href="#collapseTwo"> Exterior--}}
                                    {{--														<i class="fa fa-plus-circle"></i> <i--}}
                                    {{--																class="fa fa-minus-circle"></i> </a></div>--}}
                                    {{--												<div id="collapseTwo" class="accordion-body collapse">--}}
                                    {{--													<div class="accordion-inner">--}}
                                    {{--														<table class="table-specifications table table-striped table-hover">--}}
                                    {{--															<tbody>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Wheelbase/overall length (mm)</td>--}}
                                    {{--																<td>2,830/4,895</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Overall width (mm)</td>--}}
                                    {{--																<td>1,840</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Overall height (mm)</td>--}}
                                    {{--																<td>1,450</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Track (fr/rr) (mm)<br/>17" wheels<br/>19" wheels--}}
                                    {{--																</td>--}}
                                    {{--																<td>1,585/1,575<br/>1,595/1,585</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Turning circle, curb-to-curb (m)</td>--}}
                                    {{--																<td>11.2</td>--}}
                                    {{--															</tr>--}}
                                    {{--															</tbody>--}}
                                    {{--														</table>--}}
                                    {{--													</div>--}}
                                    {{--												</div>--}}
                                    {{--											</div>--}}
                                    {{--											<div class="accordion-group panel">--}}
                                    {{--												<div class="accordion-heading togglize"><a class="accordion-toggle"--}}
                                    {{--												                                           data-toggle="collapse"--}}
                                    {{--												                                           data-parent="#"--}}
                                    {{--												                                           href="#collapseThird">--}}
                                    {{--														Interior <i class="fa fa-plus-circle"></i> <i--}}
                                    {{--																class="fa fa-minus-circle"></i> </a></div>--}}
                                    {{--												<div id="collapseThird" class="accordion-body collapse">--}}
                                    {{--													<div class="accordion-inner">--}}
                                    {{--														<table class="table-specifications table table-striped table-hover">--}}
                                    {{--															<tbody>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Headroom (fr/rr) (mm)</td>--}}
                                    {{--																<td>975/942</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Headroom (fr/rr) with moonroof (mm)</td>--}}
                                    {{--																<td>950/942</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Legroom (fr/rr) (mm)</td>--}}
                                    {{--																<td>1,073/984</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Shoulder room (fr/rr) (mm)</td>--}}
                                    {{--																<td>1,450/1,410</td>--}}
                                    {{--															</tr>--}}
                                    {{--															</tbody>--}}
                                    {{--														</table>--}}
                                    {{--													</div>--}}
                                    {{--												</div>--}}
                                    {{--											</div>--}}
                                    {{--											<div class="accordion-group panel">--}}
                                    {{--												<div class="accordion-heading togglize"><a class="accordion-toggle"--}}
                                    {{--												                                           data-toggle="collapse"--}}
                                    {{--												                                           data-parent="#"--}}
                                    {{--												                                           href="#collapseForth">--}}
                                    {{--														Capacities <i class="fa fa-plus-circle"></i> <i--}}
                                    {{--																class="fa fa-minus-circle"></i> </a></div>--}}
                                    {{--												<div id="collapseForth" class="accordion-body collapse">--}}
                                    {{--													<div class="accordion-inner">--}}
                                    {{--														<table class="table-specifications table table-striped table-hover">--}}
                                    {{--															<tbody>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Seating</td>--}}
                                    {{--																<td>5</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Cargo volume (L)</td>--}}
                                    {{--																<td>419</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Passenger volume (L)</td>--}}
                                    {{--																<td>2,824</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Total interior volume (L)</td>--}}
                                    {{--																<td>3,243</td>--}}
                                    {{--															</tr>--}}
                                    {{--															<tr>--}}
                                    {{--																<td>Fuel tank (L)</td>--}}
                                    {{--																<td>62</td>--}}
                                    {{--															</tr>--}}
                                    {{--															</tbody>--}}
                                    {{--														</table>--}}
                                    {{--													</div>--}}
                                    {{--												</div>--}}
                                    {{--											</div>--}}
                                    {{--										</div>--}}
                                    {{--										<!-- End Toggle -->--}}
                                    {{--									</div>--}}
                                    <div id="vehicle-add-features" class="tab-pane fade">
                                        <ul class="add-features-list">
                                            @foreach($car->options($car) as $oneOption)
                                                <li>{{$oneOption}}</li>
                                            @endforeach

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="spacer-50"></div>
                            <!-- Recently Listed Vehicles -->
                            @include("bits.similarCars")
                        </div>
                        <!-- Vehicle Details Sidebar -->

                    </div>
                </article>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
