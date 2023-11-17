<div class="bg-neutral-50">
  <div class="container mx-auto py-20">

   <h1>Ebooks</h1>

   <?php echo do_shortcode('[products limit="4" columns="4" best_selling="true" ]'); ?>

   <div class="w-full flex justify-center">
      <a role="button" class="btn btn-primary btn-md font-light" href="<?php echo wc_get_page_permalink( 'shop' ) ?>">
        Ver loja
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
      </a>
    </div>

  </div>
</div>

