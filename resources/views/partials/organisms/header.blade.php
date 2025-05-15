{{-- @dump($data) --}}
<section class="{{ $data['color_theme'] == 'light' ? 'bg-white' : 'bg-gray-900' }}">
    <div class="px-6 py-24 sm:py-32 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        @include('partials.molecules.content', ['data' => $data])
      </div>
    </div>
</section>