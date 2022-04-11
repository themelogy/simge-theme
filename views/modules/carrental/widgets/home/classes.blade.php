<ul class="nav nav-tabs">
    @foreach($classes as $class)
        <li class="nav-item"><a class="nav-link {{ $class->id == 1 ? 'active' : '' }}" data-toggle="tab" href="#{{ $class->slug }}"> {{ $class->name }}</a></li>
    @endforeach
</ul>