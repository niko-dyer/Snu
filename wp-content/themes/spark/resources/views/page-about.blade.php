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

  @flexcontent('sections')
    @layout('values_shelf')
      <section class="values-shelf">
        <?php $love_image = get_sub_field('love_image') ?>
        <?php $truth_image = get_sub_field('truth_image') ?>
        <?php $honor_image = get_sub_field('honor_image') ?>
        <h1>{{ the_sub_field('value_header') }}</h1>
        <div class="icons">
          <div class="love">
            <img src="{{ $love_image['url'] }}" alt="{{ $love_image['alt'] }}">
            <h3>{{ the_sub_field('love_header') }}</h3>
            <p>{{ the_sub_field('love_description') }}</p>
          </div>
          <div class="truth">
            <img src="{{ $truth_image['url'] }}" alt="{{ $truth_image['alt'] }}">
            <h3>{{ the_sub_field('truth_header') }}</h3>
            <p>{{ the_sub_field('truth_description') }}</p>
          </div>
          <div class="honor">
            <img src="{{ $honor_image['url'] }}" alt="{{ $honor_image['alt'] }}">
            <h3>{{ the_sub_field('honor_header') }}</h3>
            <p>{{ the_sub_field('honor_description') }}</p>
          </div>
        </div>
      </section>
    @endlayout
  @endflexcontent

  @flexcontent('sections')
    @layout('contact_shelf')
      <section class="contact">
        <h1 class="header">{{ the_sub_field('contact_header') }}</h1>
        <p>If you have any questions or concerns you can send us an email <a href="mailto:alumnidonations@utahsigmanu.org?subject=Mail from our Website">here</a>!</p>
      </section>
    @endlayout
  @endflexcontent
@endsection
