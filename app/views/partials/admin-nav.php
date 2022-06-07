  <nav
    class="fixed top-0 left-0 inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:sticky 
      lg:bottom-0 lg:left-0 z-10 w-full md:w-64 
      bg-black text-white max-h-screen overflow-y-auto p-3" >
    <div class="flex justify-between">
      <div class="flex justify-center items-center w-full">
        <img src="<?php echo URLROOT; ?>/images/logo2.png" class="h-16" alt="">
        <span class="ml-4 text-main text-semibold font-semibold tracking-wide">Admin panel</span>
      </div>
      <button class="p-2 focus:outline-none focus:bg-eat-fuccia-700 hover:bg-eat-fuccia-700 rounded-md lg:hidden"
        @click="open = false">
        close
      </button>
    </div>
    <ul class="mt-8">
      <?php foreach ($data as $link) : ?>
        <div class="pb-4 text-white hover:text-gray-700">
          <a class="block px-4 py-2 hover:bg-white rounded-md"
          href=" <?= $link['route'] ?> ">
            <div class="flex items-center">
              <span class="mr-3"> <?= $link['image'] ?> </span>
              <?= $link['text'] ?>
            </div>
          </a>
        </div>
      <?php endforeach; ?>            

      <div class="pb-4 text-white hover:text-gray-700">
        <div class="block px-4 py-2 hover:bg-white rounded-md">
          <form method="POST" action="<?php echo URLROOT; ?>/admin/logout">
            <button type="submit">logout</button>
          </form>
        </div>
      </div>
    </ul>
  </nav>