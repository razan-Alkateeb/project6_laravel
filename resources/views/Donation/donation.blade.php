@extends('layout.master')
@section('title', 'Financial')
@section('content')

    <div class="home-slider owl-carousel " style="height:500px ">

        <div class="slider-item " style="background-image:url('style/images/donation3.jpg');height: 500px">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">

                            <h1 class="mb-5" style="font-size: 70px;margin-top:-150px">Financial</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="section cause-section bg-light" id="donate">



        <div class="container mb-5">
            <div class="features-slider-wrap position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="row" id="features-slider">
                    @foreach ($donation as $item)
                        <div class="item col-lg-4">
                            @php

                            $percentage = ($item->amount_donated / $item->amount_needed) * 100;
                        @endphp



                            <div class="causes-item bg-white">
                                @if ($percentage > 100)
                                <a href="#"><img
                                        src="{{ $item->image }}" alt="Image" class="img-fluid mb-4 rounded"></a>
                                @else
                                <a href="{{ route('donationform',  ['id' => $item->id,'percentage' => $percentage,'amount_needed'=>$item->amount_needed, 'amount_donated'=>$item->amount_donated]) }}"><img
                                    src="{{ $item->image }}" alt="Image" class="img-fluid mb-4 rounded"></a>
                        @endif <div class="px-4 pb-5 pt-3">
                            @if ($percentage > 100)
                                    <h3><a
                                            href="#">{{ $item->DonationName }}</a>
                                    </h3>
                                    @else
                                    <h3>
                                    <a href="{{ route('donationform', ['id' => $item->id,'percentage' => $percentage,'amount_needed'=>$item->amount_needed, 'amount_donated'=>$item->amount_donated]) }}">{{ $item->DonationName }}</a></h3>
                                    @endif
                                    <p>
                                        @php
                                            $description = $item->description;
                                            $words = explode(' ', $description, 11); // Split into words (up to 11 words)
                                            $limitedDescription = implode(' ', array_slice($words, 0, 10)); // Join the first 10 words
                                            $remainingWords = implode(' ', array_slice($words, 10)); // Join the remaining words
                                        @endphp

                                        {{ $limitedDescription }}
                                        @if (count($words) > 10)
                                            <span id="more{{ $item->id }}"
                                                style="display: none;">{{ $remainingWords }}</span>
                                            <a href="#" id="link{{ $item->id }}"
                                                onclick="toggleDescription(event, {{ $item->id }}); return false;">Read
                                                More...</a>
                                        @endif
                                    </p>

                                    @if ($percentage > 100)
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width:100%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Completed
                                            </div>
                                        </div>
                                    @else
                                        <div class="progress mb-2">
                                            <div class="progress-bar" role="progressbar" style="width:{{ $percentage }}%;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                {{ $percentage }}%
                                            </div>
                                        </div>
                                    @endif


                                    <div class="d-flex mb-4 justify-content-between amount">

                                        <div>{{ $item->amount_donated }}JD</div>

                                        <div>{{ $item->amount_needed }}JD</div>
                                    </div>
                                    @if ($percentage >= 100)
                                        <div>
                                            <button class="btn btn-primary">Completed</button>
                                        </div>
                                    @else
                                        <div>
                                            <a href="{{ route('donationform',  ['id' => $item->id,'percentage' => $percentage,'amount_needed'=>$item->amount_needed, 'amount_donated'=>$item->amount_donated]) }}"
                                                class="btn btn-primary">Donate Now</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
