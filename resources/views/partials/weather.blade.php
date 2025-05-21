<section class="p-6 bg-blue-50 rounded-xl shadow">
    <h2 class="text-xl font-semibold mb-3">Clima en Madrid</h2>
  
    @if (isset($weatherData['error']))
      <p class="text-red-600">{{ $weatherData['error'] }}</p>
    @else
      <div class="flex items-center gap-4">
        <img src="https://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}@2x.png" alt="Clima">
        <div>
          <p class="text-lg font-bold">{{ ucfirst($weatherData['weather'][0]['description']) }}</p>
          <p>Temp: {{ $weatherData['main']['temp'] }}°C</p>
          <p>Humedad: {{ $weatherData['main']['humidity'] }}%</p>
          <p>Viento: {{ $weatherData['wind']['speed'] }} m/s</p>
        </div>
      </div>
    @endif
</section>