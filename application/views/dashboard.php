<?php include_once('inc/header.php') ?>

   
<div class="p-4 sm:ml-64 mt-14 mb-0">

<div class="flex justify-between items-center">
    <h2 class="text-2xl py-2 font-bold text-slate-800 border-b-4 border-orange-600">My feeds</h2>

    <?php if($this->session->userdata('username')): ?>
    <h2 class="text-xxl text-indigo-500"><?= "Welcome ".$this->session->userdata('username');
     ?></h2>
    <?php endif ?>

    <button class="rounded-lg bg-indigo-500 p-1 dark:bg-gray-800">
        <a href="<?= site_url('post/create') ?>">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 stroke-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>

    </button>
</div>
    
   <div class="p-8 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-5">

      <!-- feeds area -->
        <ol class="relative border-l border-gray-200 dark:border-gray-700">                  
           <?php foreach($posts as $post): ?>
            <li class="mb-10 ml-6">
                <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    <?php if($post->img)?>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </span>
                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                    <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-base font-normal text-gray-400 sm:order-last sm:mb-0">2 hours ago</time>
                        <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                            <h5 class="text-bold text-blue-500">@ <?= $post->username ?></h5>
                            <h3 class="text-xl text-slate-900"><?= $post->title ?> </h3>
                        </div>
                    </div>
                    <div class="p-3 text-base italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300"><?= $post->body ?></div>
                </div>
            </li> 
            <?php endforeach ?>
        </ol>

   </div>
</div>

    
<?php include_once('inc/footer.php') ?>