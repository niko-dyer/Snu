@extends('layouts.app')

@section('content')
  <div class="uk-container uk-section">
    @loop
      {{ the_content() }}
    @endloop
  </div>
@endsection
