<!-- <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="search-field">Search</label>
  <input type="search" id="search-field" name="s" value="<?php echo get_search_query(); ?>">
  <input type="submit" value="Search">
</form> -->

<div class="search_box">
    <!-- <form action="/" method="get" autocomplete="off">
        <input type="text" name="s" placeholder="Search Code..." id="keyword" class="input_search" onkeyup="fetch()">
        <button>
            Search
        </button>
    </form>
    <div class="search_result" id="datafetch">
        <ul>
            <li>Please wait...</li>
        </ul>
    </div> -->

    <div class="dropdown">
        <form action="/" method="get" autocomplete="off" class="mb-0">
            <!-- <input type="text" name="s" placeholder="Search Code..." id="keyword" class="input_search" onkeyup="fetch()">
            <button>
                Search
            </button> -->
            <div class="relative text-gray-600">
                <input type="text" name="s" placeholder="Pesquisar" class="input_search bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none" id="keyword" onkeyup="fetch()">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </button>
            </div>
        </form>
        <ul tabindex="0" id="datafetch" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52 search_result overflow-hidden max-h-96">
            <p id="loading-spinner">loading...</p>
            <!-- <li>Please wait...</li> -->
        </ul>
    </div>
</div>