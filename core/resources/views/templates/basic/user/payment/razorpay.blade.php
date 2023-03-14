@extends($activeTemplate.'layouts.frontend')
    @section('content')

    <div class="pb-100">
        @include($activeTemplate.'partials.dashboardHeader')

        <div class="dashboard-area pt-50">
            <div class="container">
                <div class="card">
                    <div class="card-body py-5 px-2">

                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="deposit-confirm-card rounded-sm">
                                    <div class="thumb">
                                        <img src="{{$deposit->gateway_currency()->methodImage()}}" alt="@lang('Image')"/>
                                    </div>
                                    <div class="content">
                                        <form action="{{$data->url}}" method="{{$data->method}}">
                                            <h3>@lang('Please Pay') <b class="text--base">{{getAmount($deposit->final_amo)}} {{$deposit->method_currency}}</b></h3>
                                            <h3>@lang('To Get') <b class="text--base">{{getAmount($deposit->amount)}}  {{__($general->cur_text)}}</b></h3>

                                            <script src="{{$data->checkout_js}}"
                                                @foreach($data->val as $key=>$value)
                                                    data-{{$key}}="{{$value}}"
                                                @endforeach >
                                            </script>
                                            <input type="hidden" custom="{{$data->custom}}" name="hidden">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script>
        "use strict";
        $(document).ready(function () {
            $('input[type="submit"]').addClass("btn-custom2 btn btn-md btn--base mt-4");
        })
    </script>
@endpush
