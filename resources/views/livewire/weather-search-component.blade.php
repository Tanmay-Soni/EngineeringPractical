<div class="max-w-xl mx-auto bg-white p-6 rounded shadow-md space-y-4">
    <form wire:submit.prevent="searchCity">
        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Select a City</label>
        <select id="city" wire:model.defer="city" class="w-full border rounded px-4 py-2">
            <option value="">-- Choose a city --</option>
            <option value="raleigh">Raleigh</option>
            <option value="new york">New York</option>
            <option value="san francisco">San Francisco</option>
        </select>

        <button type="submit"
                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Search
        </button>
    </form>

    <div wire:loading>
        <p class="text-blue-500">Loading...</p>
    </div>

    @if (!empty($this->error))
        <p class="text-red-500 mt-4">{{ $error }}</p>
    @elseif (!empty($this->weather))
        <div class="mt-4">
            <p>Current Temperature: <span class="font-semibold">{{ $weather['temperature'] }}°C</span></p>
            <p>Current Condition: <span class="font-semibold">{{ $weather['weathercode'] }}</span></p>
        </div>
        
        <h2><u>Additional Details:</u></h2>
        <div class="mt-4">
            <p>Wind Speed: <span class="font-semibold">{{ $weather['windspeed'] }} km/h</span></p>
            <p>Wind Direction: <span class="font-semibold">{{ $weather['winddirection'] }}°</span></p>
        <div>
    @endif
</div>




