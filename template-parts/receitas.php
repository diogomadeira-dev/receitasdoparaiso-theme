<div class="group my-8 duration-300 hover:-translate-y-1">
    <a href="<?php echo get_permalink(); ?>" class="cursor-pointer">
        <div class="overflow-hidden rounded-3xl shadow-md w-full">
            <?php $post_thumbnail = get_field('imagem', get_the_ID()); ?>
            <?php if ($post_thumbnail) : ?>
                <img class="object-cover object-center h-56 w-full" src="<?php echo $post_thumbnail['guid']; ?>" alt="<?php the_title() ?>">
            <?php else : ?>
                <img class="object-cover object-center h-56 w-full" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png'); ?>" alt="img-placeholder">
            <?php endif; ?>
        </div>
        <div class="py-4">
            <h3 class="text-md font-bold leading-tight capitalize-first-letter mb-2 tracking-wide"><?php the_title() ?></h2>
            <div class="flex gap-1 opacity-0 xl:group-hover:opacity-100 transition-opacity">
                <?php if (get_the_terms( get_the_ID(), 'categoria' )) : ?>
                    <?php foreach ((get_the_terms( get_the_ID(), 'categoria' )) as $category) { ?>
                        <span class="badge text-xs text-accent"><?php echo $category->name ?></span>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div>
    </a>
</div>