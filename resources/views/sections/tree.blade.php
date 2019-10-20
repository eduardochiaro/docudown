
<!-- Medium-Up Navigation -->
<nav class="top-bar" id="nav-menu">
    <ul class="vertical medium-horizontal dropdown menu" data-dropdown-menu>
      <li><a href="{{route('index')}}">Home</a></li>
      @foreach ($categories as $category)
          @if ($category->parent_id <= 0)
            <li class="has-submenu">
              <a>{{ $category->name }}</a>
              @if (count($category->children) > 0 || count($category->files) > 0 )
              <ul class="submenu menu vertical medium-vertical" data-submenu>
                @foreach ($category->children as $children)
                  <li><a>{{ $children->name }}</a>
                  @if (count($children->files) > 0)
                  <ul class="submenu menu vertical medium-vertical" data-submenu>

                  @foreach ($children->files as $file)
                    <li><a href="{{route('file_page', ['filename'=>$file->filename])}}">{{ $file->reference }}</a></li>
                  @endforeach
                  </ul>
                  @endif
              </li>
              @endforeach
              @foreach ($category->files as $file)
                <li><a href="{{route('file_page', ['filename'=>$file->filename])}}">{{ $file->reference }}</a></li>
              @endforeach
              </ul>

            @endif
            </li>
          @endif

      @endforeach
    </ul>
</nav>
<a href="#" id="weel" class="float-right pr-4" title="scan folders">scan</a>
