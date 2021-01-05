{{--
  Template Name: About
--}}


@extends('layouts.app')

@section('content')

  <div class="about-hero">
    <h1 class="hero-head">About Us</h1>
  </div>

  <div class="divider"></div>

  @flexcontent('sections')
    @layout('5050_shelf')
    <section class="fifty-fifty-shelf">
      <div class="image">
        <?php $left_image = get_sub_field('left_image') ?>
        <img src="{{ $left_image['url'] }}" alt="{{ $left_image['alt'] }}">
      </div>
      <div class="text">
        {{ the_sub_field('right_content') }}
      </div>
    </section>
    @endlayout
  @endflexcontent

  <div class="divider"></div>

@endsection
