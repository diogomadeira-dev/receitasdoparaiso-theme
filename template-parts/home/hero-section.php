<section class="flex h-[calc(100vh-80px)]">
    <div class="grid container px-4 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Um paraíso puro em cada <span class="text-primary font-extrabold">receita</span></h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Receitas Simples, Saborosas e Saudáveis para facilitar a sua vida na cozinha.</p>
            <div class="mt-10 flex items-center justify-start gap-x-6">
              <a href="/receitas" class="btn btn-primary">Ver receitas</a>
              <a role="button" class="btn btn-ghost btn-link text-black hover:bg-neutral-50 no-underline" href="https://www.youtube.com/@ReceitasdoParaiso?sub_confirmation=1" target="_blank">
              Canal youtube
            </a>
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex lg:items-end">
          <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/home/hero-img.png'); ?>" class="w-full h-auto object-contain" />
        </div>                
    </div>
</section>