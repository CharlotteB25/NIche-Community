
   <a href="/">
   <div
      class="fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] text-center bg-gray-900">
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
        <i class="fas fa-book-open"></i>
          <h1 class="font-bold text-gray-200 text-[15px] ml-3">Book Niche Community</h1>
        </div>
</a>

        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>
      
      
      <form class="flex">
        <input class="m-5 p-2 border-2 border-gray rounded" type="text" name="search" placeholder="Search" value="{{ request('search') }}">
    </form>
    
<a href="/">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="fas fa-house"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
      </div>
</a>
<a href="/profile">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="fas fa-user"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Profile</span>
      </div>
</a>
<a href="/favourites">

      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="fas fa-solid fa-heart"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Favourites</span>
      </div>
      
      <div class="my-4 bg-gray-600 h-[1px]"></div>
      </a>
      
      <a href="/logout">
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="fas fa-arrow-right-from-bracket"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
      </div>
      </a>
    </div>
