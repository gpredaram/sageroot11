<div class="overflow-hidden rounded-lg {{ $color_theme == 'light' ? 'bg-white' : 'bg-gray-800' }} px-4 py-5 shadow sm:p-6">
    <p class="text-sm/6 font-medium {{ $color_theme == 'light' ? 'text-gray-500' : 'text-gray-300' }}">{{ $stat['stat_text'] }}</p>
    <p class="mt-2 flex items-baseline gap-x-2">
      <span class="text-4xl font-semibold tracking-tight {{ $color_theme == 'light' ? 'text-gray-900' : 'text-white' }}">{{ $stat['stat_number'] }}</span>
      @isset($stat['stat_subtitle'])
        <span class="text-sm {{ $color_theme == 'light' ? 'text-gray-500' : 'text-gray-300' }}">{{ $stat['stat_subtitle'] }}</span>
      @endisset
    </p>
</div>