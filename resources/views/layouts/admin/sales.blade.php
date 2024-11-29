<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-600 dark:text-pink-200 leading-tight tracking-wide">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row justify-around">
                <button onclick="toggleForm('branch-form')"
                    class="shadow shadow-lg hover:shadow-xl bg-indigo-400 transition hover:ease-in-out hover:shadow-indigo-200 shadow-indigo-100 hover:scale-105 hover:bg-indigo-500 duration-225 px-4 py-2 rounded-md text-white">
                    Sales per Branch
                </button>

                <button onclick="toggleForm('client-form')"
                    class="shadow shadow-lg hover:shadow-xl bg-indigo-400 transition hover:ease-in-out hover:shadow-indigo-200 shadow-indigo-100 hover:scale-105 hover:bg-indigo-500 duration-225 px-4 py-2 rounded-md text-white">
                    Sales per Client
                </button>
            </div>

            <div id="branch-form" class="hidden mt-6">
                <form method="GET" action="{{ route('admin.sales.branch') }}">
                    @csrf

                    <x-input-label for="branch_id" :value="__('Branch')" class="block" />
                    <select name="branch_id" class='border-gray-300 mt-2 p-2 border rounded w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                            shadow-sm'>
                        @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->address->city->name }}, {{
                            $branch->address->city->state->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />
                    <button type="submit" class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded">
                        Submit
                    </button>
                </form>
            </div>

            <div id="client-form" class="hidden mt-6">
                <form method="POST" action="{{ route('admin.sales.client') }}">
                    @csrf

                    <x-input-label for="client_id" :value="__('Client')" class="block" />
                    <select name="client_id" class='border-gray-300 mt-2 p-2 border rounded w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500
                            dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md
                            shadow-sm'>
                        @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->user->email }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                    <button type="submit" class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded">
                        Submit
                    </button>
                </form>
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-gray dark:bg-gray-800 overflow-hidden shadow shadow-lg hover:shadow-xl transition hover:ease-in-out duration-100 hover:shadow-purple-200 shadow-purple-100 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="container">
                            <div class="overflow-x-auto">
                                <table
                                    class="min-w-full table-auto border-collapse rounded-md shadow-sm border-purple-200 dark:border-gray-700">
                                    <thead>
                                        <tr class="bg-purple-100 dark:bg-gray-700 rounded-t-md">
                                            <th
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md text-left">
                                                Sale Id
                                            </th>
                                            <th
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                Payment Id
                                            </th>
                                            <th
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                Payment
                                            </th>
                                            <th
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left">
                                                Client Email
                                            </th>
                                            <th
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 text-left rounded-r-md">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sales as $sale)
                                        <tr class="hover:bg-purple-50 dark:hover:bg-gray-600">
                                            <td
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-l-md">
                                                {{ $sale->id }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                {{ $sale->payment_id }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                ${{ $sale->payment->amount }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                                                {{ $sale->client->user->email }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-purple-200 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-r-md flex space-x-2">
                                                <form action="{{ route('admin.sales.show', ['id' => $sale->id]) }}"
                                                    method="get">
                                                    @csrf
                                                    <button type="submit"
                                                        class="transition ease-in-out bg-purple-300 hover:scale-105 hover:bg-purple-500 duration-225 px-4 py-2 rounded-md text-white">
                                                        🔍
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleForm(formId) {
            const forms = ['branch-form', 'client-form'];
            forms.forEach(id => {
                const form = document.getElementById(id);
                if (id === formId) {
                    form.style.display = form.style.display === 'block' ? 'none' : 'block';
                } else {
                    form.style.display = 'none';
                }
            });
        }
    </script>
</x-admin-layout>
