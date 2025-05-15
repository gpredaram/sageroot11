@php
    $content_id = get_the_ID();
    $flexible_content = get_field('flexible_content', $content_id);
@endphp


@if ($flexible_content)
    @foreach ($flexible_content as $flex)

        @if ($flex['enable'])
            @switch($flex['acf_fc_layout'])
                @case('header')
                    @include('partials.organisms.header', ['data' => $flex])
                    @break
                @case('stats')
                    @include('partials.organisms.stats', ['data' => $flex])
                    @break
                @case('grid_lists')
                    @include('partials.organisms.grid-lists', ['data' => $flex])
                    @break                
            @endswitch
        @endif

    @endforeach
@endif