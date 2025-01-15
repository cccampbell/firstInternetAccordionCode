<header class="banner py-3">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="brand d-flex align-items-center" href="{{ home_url('/') }}">
      <img src="{{ get_site_icon_url() }}" alt="{{ get_bloginfo('name') }}" id="nav-logo" />
      <p class="p-0 mb-0 ms-2">{!! $siteName !!}</p>
    </a>

    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'nav',
          'container' => false,
          'echo' => false
        ]) !!}
      </nav>
    @endif
  </div>
</header>
