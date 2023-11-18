<?php
global $wp;
$current_slug = add_query_arg(array(), $wp->request);
?>

<div class="navbar container mx-auto">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li class="<?php echo ($current_slug === '') ? 'active' : ''; ?> navbar-item"><a href="/">Início</a></li>
        <li class="<?php echo ($current_slug === 'receitas') ? 'active' : ''; ?> navbar-item"><a href="/receitas">Receitas</a></li>
        <li class="<?php echo ($current_slug === 'loja') ? 'active' : ''; ?> navbar-item"><a href="/loja">Loja</a></li>
        <li class="<?php echo ($current_slug === 'sobre') ? 'active' : ''; ?> navbar-item"><a href="/sobre">Sobre nós</a></li>
        <!-- <li>
          <a>Parent</a>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </li> -->
      </ul>
    </div>

    <a href="/">
      <div class="flex items-center w-40 h-12">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/svg/logo-horizontal-light.svg'); ?>" alt="Logótipo Receitas do Paraíso" class="w-auto h-auto">
      </div>
    </a>

  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li class="<?php echo ($current_slug === '') ? 'active' : ''; ?> navbar-item"><a href="/">Início</a></li>
      <li class="<?php echo ($current_slug === 'receitas') ? 'active' : ''; ?> navbar-item"><a href="/receitas">Receitas</a></li>
      <li class="<?php echo ($current_slug === 'loja') ? 'active' : ''; ?> navbar-item"><a href="/loja">Loja</a></li>
      <li class="<?php echo ($current_slug === 'sobre') ? 'active' : ''; ?> navbar-item"><a href="/sobre">Sobre nós</a></li>
      <!-- <li tabindex="0">
        <details>
          <summary>Parent</summary>
          <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
          </ul>
        </details>
      </li> -->
    </ul>
  </div>
  <div class="navbar-end">
    <div class="flex items-center justify-between gap-2">
          <?php echo storefront_header_cart(); ?>
        <div class="dropdown dropdown-end">
        </div>
          <?php if (is_user_logged_in()) : ?>
            <div class="dropdown dropdown-end">
              <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="avatar placeholder">
                <div class="bg-neutral text-neutral-content rounded-full w-10">
                  <span><?php if( $current_user = wp_get_current_user() ) echo substr($current_user->display_name, 0, 2); ?></span>
                </div>
              </div> 
              </label>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Conta</a></li>
                <li><a href="<?php echo esc_url( wp_logout_url( get_permalink() ) ); ?>">Sair</a></li>
              </ul>
            </div>
          <?php else : ?>
            <div class="dropdown dropdown-end">
              <a role="button" class="btn btn-primary btn-sm font-light" href="<?php echo esc_url($url); ?>" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
                  Entrar
              </a>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                  <li>
                  <a class="justify-between">
                      Profile
                      <span class="badge-cart">New</span>
                  </a>
                  </li>
                  <li><a>Settings</a></li>
                  <li><a>Logout</a></li>
              </ul>
            </div>
          <?php endif; ?>

    </div>
  </div>
</div>