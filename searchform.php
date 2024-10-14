
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="relative">
  <div class="absolute left-3 top-3 text-gray-400">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
    </svg>  
  </div>
  
  <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" class="w-64 border border-gray-300 text-gray-700 shadow-sm rounded px-4 pl-10 py-2" placeholder="<?php _e('Поиск', 'web-g'); ?>" />
  <input type="submit" id="searchsubmit" value="найти" class="hidden" />
</form>