<?php require(APPROOT . '/views/partials/admin-head.php'); ?>
<?php require(APPROOT . '/views/partials/admin-nav.php'); ?>

  <div class="relative z-0 lg:flex-grow">
        <header
            class="flex bg-secondary text-white items-center px-3 text-2xl sm:text-3xl font-bold p-4 justify-end">
            <button class="p-2 focus:outline-none focus:bg-accent hover:bg-eat-green-600 rounded-md lg:hidden"
                @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>


            <div class=" hidden lg:flex justify-between items-center mr-8">
                <div class="mr-8 relative ">
                    <input
                        class="rounded-lg shadow-lg pl-10 border border-transparent focus:outline-none focus:ring-2 
                        focus:ring-red-400 focus:border-transparent -full bg-main"
                        type="text">
                          <!-- Search icon -->
                          <?php require(APPROOT . '/views/partials/icons/search.icon.php'); ?>
                      </div>
                <x-icons.messages class="text-eat-olive-50 mr-5" />
                <x-icons.notifications />
                <div class="mx-5">
                    <img class=" rounded-full w-12 h-12 bg-cover " src="https://i.pravatar.cc/40" alt="">
                </div>
            </div>


        </header>
        <main class="mx-6 mt-6 ">
          xxx
        </main>
    </div>
</body>
</html>