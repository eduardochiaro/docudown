<aside class="sidebar">
  <section class="sidebarTitle">
    <h2>Menu</h2>
  </section>
  <section class="sidebarBody">
    <ul>
    @foreach ($categories as $folder => $category)
      <li>
        <a>{{ $category['title'] }}</a>
        @if (count($category['sub']) > 0 )
        <ul>
          @foreach ($category['sub'] as $children)
            <li class="{{ $children['active'] ? 'active' : '' }}"><a href="{{ $children['link'] }}">{{ $children['title'] }}</a></li></a>
          @endforeach
        </ul>
        @endif
      </li>
    @endforeach
    </ul>
  </section>
</aside>