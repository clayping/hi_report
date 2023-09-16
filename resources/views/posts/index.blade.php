<x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <table class="w-full table-fixed">
            <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2">Title</th>
                    <th class="w-1/4 px-4 py-2">Author</th>
                    <th class="w-1/4 px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-4 py-2">
                            <a href="{{ route('posts.show', $post) }}">
                                <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">{{ $post->title }}</h2>
                                <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $post->user->name }}</td>
                        <td class="px-4 py-2"><x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3">
        <div class="table-wrapper">
            <table class="horizontal-table">
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="table-row">
                            <td class="table-cell">
                                <a href="{{ route('posts.show', $post) }}">
                                    <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words">{{ $post->title }}</h2>
                                    <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                                </a>
                            </td>
                            <td class="table-cell">{{ $post->user->name }}</td>
                            <td class="table-cell">
                                <span class="text-red-400 font-bold">
                                    {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}
                                </span>
                                {{ $post->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

                            <span class="text-red-400 font-bold">
                                {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $post->created_at ? 'NEW' : '' }}
                            </span>
                            {{ $post->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
