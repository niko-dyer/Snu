<form role="search" method="get" class="search-form" action="{{ esc_url(home_url('/')) }}">
  <div class="uk-inline">
    <button class="uk-form-icon uk-form-icon-flip" type="submit" uk-icon="search"></button>
    <input class="uk-input" id="search" value="{{ get_search_query() }}" type="search" placeholder="Search &hellip;" name="s">
  </div>
</form>
