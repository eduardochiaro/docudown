<ul>
@foreach ($categories as $category)
    {{--@foreach ($category->children as $children)--}}
    <li>
        <a>{{ $category->name }}</a>
        <ul>
        @foreach ($category->children as $children)
                <li>{{ $children->name }}
                  <ul>
                      @if ($children->file->id > 0)
                        <li><a href="{{route('file_page',['reference'=>$children->file->reference])}}">{{$children->file->reference}}</a></li>
                      @endif
                  </ul>
                </li>
        @endforeach
       </ul>
    </li>
    {{--@endforeach--}}
@endforeach
</ul>
