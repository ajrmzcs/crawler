<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl mb-8">List of Sites</div>

                    <div class="mb-8">
                        <a href="{{ route('shortUrls') }}"
                           type="button"
                           class="bg-green-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                hover:bg-green-600 transition duration-200 each-in-out">
                            Short Urls
                        </a>
                    </div>

                    <div class="mb-8">
                        <a href="{{ route('resetShortUrls') }}"
                           type="button"
                           class="bg-green-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                hover:bg-green-600 transition duration-200 each-in-out">
                            Delete Short Urls
                        </a>
                    </div>

                    <div class="mb-8">
                        <a href="{{ route('crawlTitles') }}"
                           type="button"
                           class="bg-green-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                hover:bg-green-600 transition duration-200 each-in-out">
                            Crawl Titles
                        </a>
                    </div>

                    <table class="w-full table-fixed divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id
                            </th>
                            <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Url
                            </th>
                            <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Short Url
                            </th>
                            <th scope="col" class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Crawled Title
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($sites as $site)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $site->id }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $site->url }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $site->short }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $site->title }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <span class="text-sm font-medium text-gray-900">There are no sites yet</span>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
