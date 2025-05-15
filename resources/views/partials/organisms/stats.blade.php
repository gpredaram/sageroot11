{{-- @dump($data) --}}
<section class="{{ $data['color_theme'] == 'light' ? 'bg-gray-200' : 'bg-gray-900' }} py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">

        @foreach ($data['stats'] as $stat)            
          @include('partials.molecules.stat', ['stat' => $stat, 'color_theme' => $data['color_theme']])
        @endforeach
        
      </dl>
    </div>
</section>