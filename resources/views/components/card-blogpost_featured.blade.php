<article class="bg-gray-200 rounded-lg border border-orange-500 shadow-md dark:bg-menu/50 ay-700">
    <div class="flex">
        <div class="w-1/3">
            <img src={{ $post->getImage() }}
             alt="{{ $post->title}}"
                 class="h-56 w-full rounded-tl-lg object-cover object-top"
            />
        </div>

        <div class="w-2/3 p-6">
            <header>
                <div class="flex justify-between items-center space-y-2 text-xs">
                    <x-badge-category
                            wire:navigate
                            href="{{ route('posts.index', ['category' => $post->category->slug]) }}"
                            :Color="$post->category->color">
                        {{ $post->category->name }}
                    </x-badge-category>

                    <div class="text-gray-700 dark:text-gray-300">{{ $post->likes_count }} Likes</div>
                </div>
                <x-link-primary class="text-xl" href="{{ route('posts.show', $post->id) }}">
                    {{ $post->title }} - {{ $post->id }}
                </x-link-primary>
            </header>
            <main>
                <div class="my-4 flex justify-between items-center uppercase text-xs text-gray-700 dark:text-gray-300">
                    <div class="flex space-x-4 ">
                        <div>BY <span class="text-orange-500 font-semibold">{{ $post->author->username }}</span></div>
                        <div>{{ $post->getFormattedDate() }}</div>
                    </div>
                    <div>
                        {{  $post->comments_count }} Comments
                    </div>
                </div>
                <div class="prose prose-sm max-w-none text-gray-700 dark:text-gray-200">
                    {{ $post->shortBody() }}
                </div>
            </main>
        </div>
    </div>
    <footer class="flex justify-end my-4 px-6">
        <a href="{{ route('posts.show', $post->id) }}"
           class="inline-flex items-center text-orange-500 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:text-gray-600 dark:focus:text-gray-200 transition duration-150 ease-in-out">
            Read More
            <x-heroicon-o-arrow-right-circle class="ml-1 size-4"/>
        </a>
    </footer>
</article>