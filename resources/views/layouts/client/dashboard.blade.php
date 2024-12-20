<x-client-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('client.branch') }}" method="post">
                        @csrf
                        <x-input-label for="branch_id" :value="__('Select a branch to start shopping')" />
                        <div class="mt-4">
                            <select required id="branch_select" name="branch_id"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">
                                    {{ $branch->address->street }} {{ $branch->address->number }}, {{
                                    $branch->address->neighborhood }}, {{ $branch->address->city->name }}, {{
                                    $branch->address->city->state->name }}
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />
                            <div class="flex items-center justify-end mt-4">
                                <button
                                    class="shadow shadow-lg hover:shadow-xl bg-violet-600 transition hover:ease-in-out  hover:shadow-violet-200 shadow-violet-100 hover:scale-105 hover:bg-violet-700 duration-225 px-4 py-2 rounded-md text-white">
                                    Select Branch
                                </button>
                            </div>
                        </div>
                    </form>

                    <iframe id="map" width="600" height="450" style="border:0" loading="lazy" allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade" src=""></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const branchData = @json($branches);

            function formatAddress(street, number, neighborhood, city, state) {
                return `${street} ${number}, ${neighborhood}, ${city}, ${state}`.replace(/\s+/g, '+');
            }

            const branchSelect = document.getElementById("branch_select");

            branchSelect.addEventListener('change', function () {
                const branchId = branchSelect.value;

                const selectedBranch = branchData.find(branch => branch.id == branchId);

                if (selectedBranch) {
                    const address = selectedBranch.address;
                    const addressStr = formatAddress(address.street, address.number, address.neighborhood, address.city.name, address.city.state.name);
                    const mapUrl = `https://www.google.com/maps/embed/v1/place?key=AIzaSyBVlrP9GWx45IDEtLbRcGfYWHFExBN4cDE&q=${encodeURIComponent(addressStr)}+Mexico`;

                    document.getElementById('map').src = mapUrl;
                }
            });

            const initialBranchId = branchSelect.value;
            if (initialBranchId) {
                const selectedBranch = branchData.find(branch => branch.id == initialBranchId);

                if (selectedBranch) {
                    const address = selectedBranch.address;
                    const addressStr = formatAddress(address.street, address.number, address.neighborhood, address.city.name, address.city.state.name);
                    const mapUrl = `https://www.google.com/maps/embed/v1/place?key=AIzaSyBVlrP9GWx45IDEtLbRcGfYWHFExBN4cDE&q=${encodeURIComponent(addressStr)}+Mexico`;

                    document.getElementById('map').src = mapUrl;
                }
            }
        });
    </script>
</x-client-layout>
