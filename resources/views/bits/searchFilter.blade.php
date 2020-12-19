<div class="col-md-3 search-filters" id="Search-Filters">
    <div class="tbsticky filters-sidebar">
        <h3>{{__('messages.search')}}</h3>
        <div class="accordion" id="toggleArea">
            <!-- Filter by Year -->

            <!-- Filter by Make -->
            <div class="accordion-group panel">
                <div class="accordion-heading togglize">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#"
                       href="#collapseTwo">{{__('messages.make')}}<i
                            class="fa fa-angle-down"></i> </a></div>
                <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul class="filter-options-list list-group">
                            @foreach($makes as $oneMake)
                                <li class="list-group-item">
                                    <span class="badge">{!! count($oneMake) !!}</span>
                                    <a href="{{route("sortBy", ['option'=> 'make', 'value' => $oneMake->first()->make])}}">{{$oneMake->first()->make}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Filter by Model -->

            <!-- Filter by Transmission -->
            <div class="accordion-group">
                <div class="accordion-heading togglize"><a class="accordion-toggle"
                                                           data-toggle="collapse" data-parent="#"
                                                           href="#collapseSix">{{__('messages.gearbox')}} <i
                            class="fa fa-angle-down"></i> </a></div>
                <div id="collapseSix" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <ul class="filter-options-list list-group">
                            @foreach($gearbox as $oneGearbox)
                                <li class="list-group-item">
                                    <span class="badge">{{count($oneGearbox)}}</span>
                                    <a href="{{route("sortBy", ['option'=>'gearbox', 'value'=>$oneGearbox->first()->gearbox])}}">{{$oneGearbox->first()->gearbox}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading togglize"><a class="accordion-toggle"
                                                           data-toggle="collapse" data-parent="#"
                                                           href="#collapseEight">{{__('messages.price')}} <i
                            class="fa fa-angle-down"></i> </a></div>
                <div id="collapseEight" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <div class="form-inline">
                            <form method="get" action="{{route("sortBy", ['option'=>'cena', 'value'=>'check'])}}">
                                <div class="form-group">
                                    <label>{{__('messages.min')}}</label>
                                    <select name="min_val" class="form-control selectpicker">
                                        <option value="{{$price['min']}}" selecdet>£{{$price['min']}}</option>
                                        @for($i = 1; $i <= 9; $i++)
                                            <option
                                                value="{{$price['min'] + ($price['step'] * $i)}}">
                                                £{{$price['min'] + ($price['step'] * $i)}}

                                            </option>
                                        @endfor
                                        <option value="{{$price['max']}}">£{{$price['max']}}</option>
                                    </select>
                                </div>
                                <div class="form-group last-child">
                                    <label>{{__('messages.max')}}</label>
                                    <select name="max_val" class="form-control selectpicker">
                                        <option value="{{$price['min']}}">£{{$price['min']}}</option>
                                        @for($i = 1; $i <= 9; $i++)
                                            <option
                                                value="{{$price['min'] + ($price['step'] * $i)}}">
                                                £{{$price['min'] + ($price['step'] * $i)}}
                                            </option>
                                        @endfor
                                        <option value="£{{$price['max']}}" selected>£{{$price['max']}}</option>
                                    </select>
                                </div>
                                <button type="submit"
                                        class="btn btn-default btn-sm pull-right">{{__('messages.apply_filter')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Toggle -->

    </div>
</div>
