@extends('master_layout')
@section('new-layout')

    <div class="section optech-section-padding2">
        <div class="container">
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="400">
                    <div class="optech-team-wrap border_all">
                        <div class="optech-team-thumb">
                            <img src="{{ asset($team->image) }}" alt="">
                            <div class="optech-social-icon-box style-three position">
                                <ul>
                                    <li>
                                        <a href="{{ $team->linkedin }}" target="_blank">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->twitter }}" target="_blank">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $team->instagram }}" target="_blank">
                                            <i class="ri-instagram-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="optech-team-data">
                            <a href="single-team.html">
                                <h5>{{ $team->name }}</h5>
                            </a>
                            <p>{{ $team->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
