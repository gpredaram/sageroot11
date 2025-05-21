<section class="p-6 bg-gray-100">
    <h2 class="text-2xl font-bold mb-4">Últimos posts desde API externa</h2>
  
    @if (isset($apiItems['error']))
      <p class="text-red-500">{{ $apiItems['error'] }}</p>
    @else
      <ul class="space-y-3">
        @foreach ($apiItems as $item)
          <li class="p-4 bg-white shadow rounded">
            <h3 class="font-semibold text-lg">{{ $item['title'] }}</h3>
            <p class="text-gray-600">{{ $item['body'] }}</p>
          </li>
        @endforeach
      </ul>
    @endif
</section>