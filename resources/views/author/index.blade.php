@extends('layouts.author')

@section('title')
    Welcome Mate
@endsection

@section('banner')
    <img src="{{asset('storage/images/FotoKotak.jpg')}}" class="img-fluid img-thumbnail profileImg rounded-circle">
    <div class="bg-dark text-light text-center mt-4 rounded p mx-auto pt-3 pb-3" style="width:30em">
        <p>Name : Hans Richard Alim Natadjaja</p>
        <p>City : Surabaya</p>
        <p>Date of Birth : 7 November 2000</p>
        <p>Hobby : Chess</p>
    </div>
@endsection

@section('content')
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>

            <div class="row">
                <div class="col text-justify">
                    <p>Hans Richard Alim Natadjaja is a Technology Enthusiast that loves to learn everything about
                        Sustainable Technology. Right now he continued his study at Ciputra University as Informatics Student. In my college he
                        was involved in various IT projects that related to Mobile App Development, Web Development,
                        Machine Learning and Internet of Things. Not just that he also ever collaborate with some people
                        to create a Capstone Project about Statistics for predicting Car Price using Python.
                        Currently he focus to learn about Internet of Things. Become a World Class Developer is one of his goal.

                        Feel free if you want to see hans' portofolio at link bellow: <br>
                        <a href="https://linktr.ee/hansrich2000">https://linktr.ee/hansrich2000</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="row">
                <div class="col text-center">
                    <h2>Skillset</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('storage/images/android.png')}}" class="card-img-top" style="height: 13rem;">
                        <div class="card-body">
                            <p class="card-text text-center">Android Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('storage/images/web.jpg')}}" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text text-center">Web Development</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('storage/images/internet-of-things.jpg')}}" class="card-img-top" style="height: 13rem;">
                        <div class="card-body">
                            <p class="card-text text-center">Internet of Things</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
