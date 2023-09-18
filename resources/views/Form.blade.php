@extends('layout.master')
@section('title','Form')
	@section('content')
    <div class="hero overlay" style="background-image: url('style/images/hero_2.jpg')">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 text-left">
                    <span class="subheading-white text-white mb-3" data-aos="fade-up">Volunteer</span>
                    <h1 class="heading text-white mb-2" data-aos="fade-up">Give a helping hand to those who need it!</h1>
                    <p data-aos="fade-up" class=" mb-5 text-white lead text-white-50">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum minima dignissimos hic mollitia eius et quam ducimus maiores eos magni.</p>
                    <p data-aos="fade-up"  data-aos-delay="100">
                        <a href="#" class="btn btn-primary me-4 d-inline-flex align-items-center"> <span class="icon-attach_money me-2"></span><span>Donate Now</span></a>
                        <a href="https://www.youtube.com/watch?v=mwtbEGNABWU" class="text-white glightbox d-inline-flex align-items-center"><span class="icon-play me-2"></span><span>Watch the video</span></a>
                    </p>

                </div>
            </div>
        </div>
                <div class="col-lg-12 container">
                    <form action="#" class="bg-white p-5 rounded donation-form" data-aos="fade-up">
                        <h3>Quick Donation Form</h3>
                        <div class="form-field mb-3">
                            <label for="amount-1" class="amount js-amount" data-value="1.00">
                                <input type="radio" id="amount-1" name="radio-amount" checked="true">
                                <span>$1</span>
                            </label>

                            <label for="amount-2" class="amount js-amount" data-value="5.00">
                                <input type="radio" id="amount-2" name="radio-amount">
                                <span>$5</span>
                            </label>
                            <label for="amount-3" class="amount js-amount" data-value="25.00">
                                <input type="radio" id="amount-3" name="radio-amount" >
                                <span>$25</span>
                            </label>
                            <label for="amount-4" class="amount js-amount" data-value="100.00">
                                <input type="radio" id="amount-4" name="radio-amount">
                                <span>$100</span>
                            </label>

                        </div>
                        <div class="field-icon">
                            <span>$</span>
                            <input type="text" placeholder="0.00" class="form-control px-4" name="donate-value" value="1.00">
                        </div>
                        <div class="form-field mb-3">
                            <input type="text" placeholder="Name" class="form-control px-4">
                            <input type="email" placeholder="Email" class="form-control px-4">
                        </div>

                        <input type="submit" value="Donate now" class="btn btn-secondary w-100">
                    </form>
                </div>


@endsection
