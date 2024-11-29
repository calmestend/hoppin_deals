<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.branches.store') }}">
                        @csrf

                        <!-- Autocomplete Field -->
                        <div>
                            <x-input-label for="autocomplete" :value="__('Address')" />
                            <x-text-input id="autocomplete" class=" mt-1 w-full" type="text" name="address" required />
                        </div>

                        <!-- Neighborhood -->
                        <div class="mt-4">
                            <x-input-label for="neighborhood" :value="__('Neighborhood')" />
                            <x-text-input id="neighborhood" class=" mt-1 w-full  " type="text" name="neighborhood" />
                        </div>

                        <!-- Zip Code -->
                        <div class="mt-4">
                            <x-input-label for="zip_code" :value="__('Zip Code')" />
                            <x-text-input id="zip_code" class=" mt-1 w-full  " type="text" name="zip_code" />
                        </div>

                        <!-- Street -->
                        <div class="mt-4">
                            <x-input-label for="street" :value="__('Street')" />
                            <x-text-input id="street" class=" mt-1 w-full  " type="text" name="street" />
                        </div>

                        <!-- Number -->
                        <div class="mt-4">
                            <x-input-label for="number" :value="__('Number')" />
                            <x-text-input id="number" class=" mt-1 w-full  " type="text" name="number" />
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="city_id" :value="__('City')" />
                            <select name="city_id" id="city_id" class=" mt-1 w-full  ">
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button
                                class="shadow hover:shadow-lg bg-violet-600 hover:bg-violet-700 text-white px-4 py-2 rounded-md transition ease-in-out duration-150">
                                Create Branch
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            const input = document.getElementById('autocomplete');
            const autocomplete = new google.maps.places.Autocomplete(input);
            const componentForm = {
                street_number: 'number',
                route: 'street',
                locality: 'city_id',
                postal_code: 'zip_code',
                sublocality_level_1: 'neighborhood',
            };

            autocomplete.addListener('place_changed', function () {
                const place = autocomplete.getPlace();
                console.log(place.url);
                const addressComponents = place.address_components;

                if (addressComponents) {
                    addressComponents.forEach(component => {
                        const addressType = component.types[0];
                        if (componentForm[addressType]) {
                            const elementId = componentForm[addressType];
                            const value = component.long_name;

                            if (elementId === 'city_id') {
                                selectCityByName(value);
                            } else {
                                document.getElementById(elementId).value = value;
                            }
                        }
                    });
                }
            });

            function selectCityByName(cityName) {
                const citySelect = document.getElementById('city_id');
                Array.from(citySelect.options).forEach(option => {
                    if (option.text === cityName) {
                        option.selected = true;
                    }
                });
            }
        }
    </script>
</x-admin-layout>
