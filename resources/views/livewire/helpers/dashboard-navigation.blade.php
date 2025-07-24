<div class="w-full" x-data>
    <div class="bg-[#141414] relative h-16 flex justify-center items-center border-b-[0.8px] border-[#ccc]/40">
        <x-logo class="w-9 h-9 text-[#70706e]"/>
        <x-icons.arrow-left @click="isOpenMenu = !isOpenMenu" class="md:hidden cursor-pointer w-7 h-7 p-1 rounded-lg text-white flex justify-center items-center bg-[#70706e] absolute right-[-10px]" />
    </div>
    <nav class="flex flex-col justify-between h-[calc(100vh-4rem)]">
        <ul class="space-y-2">
            @foreach($routesArray as $router)
                <li @click="isOpenMenu = !isOpenMenu" class="p-2">
                    <a href="{{ route($router['name']) }}"
                       class="hover:bg-[#2e2e2d] transition-colors duration-200 flex justify-center p-2 rounded-lg
                   {{ $this->isActiveRoute($router['name']) ? 'bg-gray-600/40':''  }}" wire:navigate>
                        {!! $router['svg'] !!}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="text-white flex flex-col items-center justify-center">
            <div class="h-16 w-full flex flex-col justify-center items-center">
                <x-icons.tools class="w-8 h-8" />
            </div>
        </div>
    </nav>
</div>
