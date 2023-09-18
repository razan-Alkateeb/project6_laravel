<div class="section cause-section bg-light">

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading">Emergency Cases</h2>
                <p>Donations for emergency cases are a lifeline in times of crisis. Your
                    contribution can make a profound difference, providing crucial support
                    to those facing urgent needs, such as disaster survivors, medical emergencies,
                    and humanitarian crises.</p>

                <div id="features-slider-nav" class="mt-5 d-flex justify-content-center">
                    <button class="btn btn-primary prev d-flex align-items-center me-2" data-controls="prev"> <span
                            class="icon-chevron-left"></span> <span class="ms-3"
                            style="background-color:rgba(89, 136, 107, 0.7)">Prev</span></button>
                    <button class="btn btn-primary next d-flex align-items-center" data-controls="next"><span
                            class="me-3">Next</span> <span class="icon-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>


    <div class="container mb-5">
        <div class="features-slider-wrap position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="features-slider" id="features-slider">
                @foreach ($donation as $item)
                    <div class="item">
                        <div class="causes-item bg-white">
                            <a href="#"><img src="{{ $item->image }}" alt="Image"
                                    class="img-fluid mb-4 rounded"></a>
                            <div class="px-4 pb-5 pt-3">

                                <h3><a href="#">{{ $item->DonationName }}</a></h3>
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

                                @php

                                    $percentage = ($item->amount_donated / $item->amount_needed) * 100;
                                @endphp

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
                                        {{-- <a href="" class="btn btn-primary"></a> --}}
                                    </div>
                                @else
                                    <div>
                                        <a href="{{ route('donationform', ['id' => $item->id, 'percentage' => $percentage, 'amount_needed' => $item->amount_needed, 'amount_donated' => $item->amount_donated]) }}"
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
