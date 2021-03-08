{{--
  Template Name: Home
--}}

@php
  $U = "/wp-content/uploads/2020/04/utesLogo.png";
  $otherU = "/wp-content/uploads/2020/04/UofU.jpg";
  $about = "/wp-content/uploads/2020/04/Screenshot-2020-04-11-21.17.53.png";
  $snake = "/wp-content/uploads/2020/04/snake.png";
  $crest = "/wp-content/uploads/2020/04/crest-1.png";
  $group = "/wp-content/uploads/2020/04/Screenshot-2020-04-12-19.14.58-e1586741207508.png";
  $theBoys = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.03.18.png";
  $basketball = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.08.38.png";
  $roof = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.10.53.png";
  $anchor = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.16.22.png";
  $lineDance = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.18.32.png";
  $wall = "/wp-content/uploads/2020/04/Screenshot-2020-04-13-23.21.59.png";
@endphp

@extends('layouts.app')

@section('content')

<div class="hero regular-wrapper">
  <div class="banner">
    <img class="utes-logo" src="{{$U}}" alt="University of Utah Logo">
    <br>
    <h1 class="hero-head">Epsilon Lambda Chapter 103</h1>
  </div>
</div>
<div class="parallax-wrapper fireplace">
  <div class="content story">
    <h2 class="about-head">{{ the_field('story_header') }}</h2>
    <p>
      {{ the_field('story_text_field') }}
    </p>
    <a href="http://snu.test/about"><button class="btn btn-1 btn-1e">{{ the_field('story_button') }}</button></a>
  </div>
</div>
<div style="padding-top: 0;" class="regular-wrapper crest">
  <div class="crest-content">
    <div class="crest-text">
      <h2>Mission</h2>
      <p>To develop ethical leaders inspired by the principles of Love, Honor and Truth.
        To foster the personal growth of each man’s mind, heart and character.
        To perpetuate lifelong friendships and commitment to the Fraternity.</p>
    </div>
    <img class="crest-img" src="{{$group}}" alt="Sigma Nu crest">
  </div>
</div>
<div class="parallax-wrapper chapter">
  <div class="content-chapter">
    <h2 class="chapter-head">{{ the_field('events_header') }}</h2>
    <p>{{ the_field('events_text') }}</p>
  </div>
</div>
@endsection

{{--   Possible Gallery, would need tweaking   --}}
{{--  <h2 class="gallery">Gallery</h2>--}}
{{--  <div class="photo-grid">--}}
{{--    <img src="{{$theBoys}}" alt="The Boys" class="gall-photo">--}}
{{--    <img src="{{$basketball}}" alt="Basketball" class="gall-photo">--}}
{{--    <img src="{{$roof}}" alt="Roof" class="gall-photo">--}}
{{--    <img src="{{$anchor}}" alt="Anchor Splash" class="gall-photo">--}}
{{--    <img src="{{$lineDance}}" alt="" class="gall-photo">--}}
{{--    <img src="{{$wall}}" alt="Wall of Fame" class="gall-photo">--}}
{{--  </div>--}}
