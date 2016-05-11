
<!-- Medium-Up Navigation -->
<nav class="top-bar" id="nav-menu">

  <!-- Right Nav Section -->
  <div class="top-bar-right">
    <ul class="vertical medium-horizontal dropdown menu" data-dropdown-menu>
      @foreach ($categories as $category)

          @if ($category->parent_id <= 0)
            <li class="has-submenu">
              <a href="#">{{ $category->name }}</a>
              @foreach ($category->children as $children)
              <ul class="submenu menu vertical medium-horizontal" data-submenu>
                <li><a href="#">{{ $children->name }}</a></li>
              </ul>
              @endforeach
            </li>
          @endif
      @endforeach
    </ul>
  </div>

</nav>
