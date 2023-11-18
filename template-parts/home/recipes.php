<div class="bg-neutral-50 py-16 sm:py-20">
  <div class="container mx-auto">

    <h1>Últimas receitas</h1>

    <?php

    $args = array(  
      'post_type' => 'receitas',
      'post_status' => 'publish',
      'posts_per_page' => 8, 
      'orderby' => 'date', 
      'order' => 'DESC', 
    );

    $loop = new WP_Query( $args ); 
    
      if ( $loop->have_posts() ) : ?>

        <div class="grid grid-flow-row gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
      
          <?php while ( $loop->have_posts() ) : $loop->the_post(); 

            get_template_part( 'template-parts/receitas', get_post_format() );

          endwhile;

          wp_reset_postdata(); 

          ?>

        </div>

      <?php endif; ?>

      <div class="w-full flex justify-center">
        <a role="button" class="btn btn-primary btn-md font-light" href="/receitas">
          Ver receitas
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right"><path d="M18 8L22 12L18 16"/><path d="M2 12H22"/></svg>
        </a>
      </div>

  </div>
</div>