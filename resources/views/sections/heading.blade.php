@php
    $color_theme = get_field('color_theme', 'options');
    $heading_title = get_field('heading_title', 'options');
    $heading_buttons = get_field('heading_buttons', 'options');
@endphp

<section class="min-h-full">
  <nav class="border-b border-gray-200 bg-white p-8">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
          <h2 class="text-2xl/7 font-bold text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ $heading_title }}</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0 gap-3">

          @foreach ($heading_buttons as $k => $button)          
            @isset($button['button_link'])                
              @include('partials.atoms.button', ['button' => $button])
            @endisset
          @endforeach
         
      </div>
    </div>
  </nav>
</section>