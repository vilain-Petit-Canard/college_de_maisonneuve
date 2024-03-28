@extends('layouts.app')
@section('title', 'Bienvenue')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<style>
    .masthead {
  height: 50vh;
  min-height: 500px;
  background-image: url('https://images.unsplash.com/photo-1472289065668-ce650ac443d2?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  /* opacity: 50%; */
}
.btn-inscription{
    /* background-color: #231834; */
}
.home-testimonial{
}
.home-testimonial{background-color:lightgrey ;height: 380px}.home-testimonial-bottom{background-color: #f8f8f8;transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;margin-top: 20px;margin-bottom: 0px;position: relative;height: 130px;top: 190px}.home-testimonial h3{color: var(--orange);font-size: 14px;font-weight: 500;text-transform: uppercase}.home-testimonial h2{color: white;font-size: 28px;font-weight: 700}.testimonial-inner{position: relative;top: -174px}.testimonial-pos{position: relative;top: 24px}.testimonial-inner .tour-desc{border-radius: 5px;padding: 40px}.color-grey-3{font-family: "Montserrat", Sans-serif;font-size: 14px;color: #6c83a2}.testimonial-inner img.tm-people{width: 60px;height: 60px;-webkit-border-radius: 50%;border-radius: 50%;-o-object-fit: cover;object-fit: cover;max-width: none}.link-name{font-family: "Montserrat", Sans-serif;font-size: 14px;color: #6c83a2}.link-position{font-family: "Montserrat", Sans-serif;font-size: 12px;color: #6c83a2}
</style>
<!-- <div class=" main-container flex h-100 bg-secondary-subtle"> -->
    <!-- <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1 class="display-6 text-center">Bienvenue au college de Maisonneuve</h1>
            </div>
            <div class="card-body">
                <p>Ceci est une plateforme de gestion de tous les étudiants du collège</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('etudiant.index')}}" class="btn btn-primary">Voir la liste des étudiants</a>
            </div>
        </div>
    </div> -->
    <header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <h1 class="fw-light">@lang('lang.home.text_welcome_title')</h1>
        <p class="lead">@lang('lang.home.text_welcome_subtitle')</p>
        @guest
        <a href="{{ route('user.create')}}" class="btn btn-lg btn-secondary mt-4">@lang('lang.home.suscription')</a>        
        @else
        <a href="{{ route('article.index')}}" class="btn-inscription btn btn-lg btn-secondary mt-4">@lang('lang.home.see_forum')</a>
        @endguest
        
      </div>
    </div>
  </div>
</header>
<!-- Explore the students experience -->
<!-- At this School, our mission is to balance a rigorous comprehensive college preparatory curriculum with healthy social and emotional development -->
<!-- Page Content -->
<section class="home-testimonial ">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center testimonial-pos">
            <div class="col-md-12 pt-4 d-flex justify-content-center">
                <h3>@lang('lang.home.Testimonials')</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <h2>@lang('lang.home.experience')</h2>
            </div>
        </div>
        <section class="home-testimonial-bottom">
            <div class="container testimonial-inner">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;@lang('lang.home.mission')
                                    &rdquo;</div>
                                    <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/6625914/pexels-photo-6625914.jpeg" alt=""></div>
                                        <div class="link-name d-flex justify-content-center">Balbir Kaur</div>
                                        <div class="link-position d-flex justify-content-center">@lang('lang.home.teacher')
                                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;@lang('lang.home.testimonial_1')&rdquo;</div>
                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Mickey Mouse</div>
                                <div class="link-position d-flex justify-content-center">@lang('lang.home.student')</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;@lang('lang.home.testimonial_2')&rdquo;</div>
                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/4946604/pexels-photo-4946604.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Bala Braus</div>
                                <div class="link-position d-flex justify-content-center">@lang('lang.home.student')</div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
</section>

@endsection
