
<!-- Medium-Up Navigation -->
<nav class="top-bar" id="nav-menu">

  <div class="top-bar-left">
    <ul class="vertical medium-horizontal dropdown menu" data-dropdown-menu>
      @foreach ($categories as $category)
          @if ($category->parent_id <= 0)
            <li class="has-submenu">
              <a href="#">{{ $category->name }}</a>
              <ul class="submenu menu vertical medium-vertical" data-submenu>
              @foreach ($category->children as $children)
                <li><a href="#">{{ $children->name }}</a>
                <ul class="submenu menu vertical medium-vertical" data-submenu>

                @foreach ($children->file as $file)
                  <li><a href="{{route('file_page', ['filename'=>$file->filename])}}">{{ $file->reference }}</a></li>
                @endforeach
                </ul></li>
              @endforeach
              @foreach ($category->file as $file)
                <li><a href="{{route('file_page', ['filename'=>$file->filename])}}">{{ $file->reference }}</a></li>
              @endforeach
              </ul>
            </li>
          @endif

      @endforeach
    </ul>
  </div>
<div class="top-bar-right">
<a href="#" id="weel" class="fi-widget" title="scan folders"></a>
</div>
</nav>
