<nav
    class="flex items-center justify-between flex-wrap p-6 fixed w-full z-50 top-0 xborder-b xborder-gray-100 shadow-sm"
    x-data="{ isOpen: false }"
    @keydown.escape="isOpen = false"
    :class="{ 'shadow-lg bg-gray-100' : isOpen , 'bg-white' : !isOpen}"
>
    <!--Logo-->
    <div class="flex items-center flex-shrink-0  mr-6">
        <a href="/" class="" >
            <img src="/images/logos/logo_400px_black.png" width="300px" alt="Hybrid Teams HQ">
        </a>
    </div>
    <!--Toggle button (hidden on large screens)-->
    <button
        @click="isOpen = !isOpen"
        type="button"
        class="block lg:hidden px-2 text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800"
        :class="{ 'transition transform-180': isOpen }"
        >
        <svg
            class="h-6 w-6 fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            >
            <path
                x-show="isOpen"
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
            />
            <path
                x-show="!isOpen"
                fill-rule="evenodd"
                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
            />
        </svg>
    </button>
    <!--Menu-->
    <div
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
        :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
        @click.away="isOpen = false"
        x-show.transition="true"
    >
        <ul class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-4">
                <a
                    class="
                        @if(request()->routeIs('public.home'))
                            text-indigo-700 border-indigo-700
                        @else
                            hover:text-indigo-700 border-white hover:border-indigo-700 hover:bg-white
                        @endif
                        inline-block text-gray-600 no-underline  border-b-2 py-2 px-4
                    "
                    href="{{ route('public.home') }}"
                    @click="isOpen = false"
                >
                    Home
                </a>
            </li>
            <li class="mr-4">
                <a
                    class="
                        @if(request()->routeIs('public.about'))
                            text-indigo-700 border-indigo-700
                        @else
                            hover:text-indigo-700 border-white hover:border-indigo-700
                        @endif
                        inline-block text-gray-600 no-underline  border-b-2 py-2 px-4
                    "
                    href="{{ route('public.about') }}"
                    @click="isOpen = false"
                >
                    About
                </a>
            </li>
            <li class="mr-4">
                <a
                    class="
                        @if(request()->routeIs('public.faq'))
                            text-indigo-700 border-indigo-700
                        @else
                            hover:text-indigo-700 border-white hover:border-indigo-700
                        @endif
                        inline-block text-gray-600 no-underline  border-b-2 py-2 px-4
                    "
                    href="{{ route('public.faq') }}"
                    @click="isOpen = false"
                >
                    FAQs
                </a>
            </li>
            <li class="ml-2 mr-4">
                <a
                    class="
                        @if(request()->routeIs('public.book'))
                            text-pink-500 bg-white
                        @else
                            bg-pink-500 hover:text-pink-500  hover:bg-white
                        @endif
                        border-2 border-pink-500 inline-block text-white no-underline px-3 py-2  rounded-md
                    "
                    href="{{ route('public.book') }}"
                    @click="isOpen = false"
                >
                    Book a Call
                </a>
            </li>
        </ul>
    </div>
</nav>
