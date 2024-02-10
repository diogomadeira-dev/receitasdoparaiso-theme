<div class="bg-gradient-to-r from-orange to-primary py-16 sm:py-20">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
      <div class="mx-auto flex max-w-xs flex-col gap-y-4">
        <dt class="text-base leading-7 text-white">Subscritores</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">+<?php echo do_shortcode('[rp_options key="rp_subscribers"]'); ?> mil</dd>
      </div>
      <div class="mx-auto flex max-w-xs flex-col gap-y-4">
        <dt class="text-base leading-7 text-white">Visualizações</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">+<?php echo do_shortcode('[rp_options key="rp_views"]'); ?></dd>
      </div>
      <div class="mx-auto flex max-w-xs flex-col gap-y-4">
        <dt class="text-base leading-7 text-white">Receitas</dt>
        <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl"><?php echo $count_recipes = wp_count_posts( 'receitas' )->publish; ?></dd>
      </div>
    </dl>
  </div>
</div>
