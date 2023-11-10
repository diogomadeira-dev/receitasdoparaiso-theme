<article id="post-<?php the_ID(); ?>">

    <div class="flex gap-10">

        <div class="flex-1">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php else : ?>
                <img class="object-cover max-h-96 w-full border" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/img-placeholder.png'); ?>" alt="img-placeholder">
            <?php endif; ?>
        </div>


        <div class="flex-1">
            <header class="mb-6">
                <div class="flex justify-between">
                <?php the_title(sprintf('<h1 class="entry-title text-2xl lg:text-4xl font-extrabold leading-tight capitalize-first-letter mb-2">', esc_url(get_permalink())), '</h1>'); ?>
                <!-- <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time> -->

                    <div class="flex justify-end gap-2">
                        <?php
                        $previous_recipe = get_previous_post();
                        if ($previous_recipe) :
                            $previous_recipe_url = get_permalink($previous_recipe);
                        ?>
                            <a href="<?php echo $previous_recipe_url; ?>" data-tooltip-target="tooltip-default">
                                <span class="dashicons dashicons-arrow-left-alt"></span>
                            </a>
                        <?php endif;
                        ?>

                        <?php
                        $next_recipe = get_next_post();
                        if ($next_recipe) :
                            $next_recipe_url = get_permalink($next_recipe);
                        ?>
                            <a href="<?php echo $next_recipe_url; ?>">
                                <span class="dashicons dashicons-arrow-right-alt"></span>
                            </a>
                        <?php endif;
                        ?>
                    </div>
                </div>
                <div>
                    <?php
                    foreach ((get_the_category()) as $category) {
                    ?>
                        <span class="bg-primary/10 text-primary text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full"><?php echo $category->name ?></span>
                    <?php
                    }
                    ?>
                </div>
            </header>

            <div class="entry-content">
                <div class="tracking-wider text-sm leading-6">
                    <?php the_content(); ?>
                </div>

                <?php
                // Get the custom field value
                $url = get_post_meta(get_the_ID(), 'url', true);

                // Check if the field has a value
                if (!empty($url)) {
                    echo '<p><strong>URL Youtube:</strong> <a href="' . esc_url($url) . '" target="_blank">' . esc_url($url) . '</a></p>';
                }
                ?>

                <?php
                // wp_link_pages(
                //     array(
                //         'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
                //         'after'       => '</div>',
                //         'link_before' => '<span>',
                //         'link_after'  => '</span>',
                //         'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
                //         'separator'   => '<span class="screen-reader-text">, </span>',
                //     )
                // );
                ?>

            </div>
        </div>
    </div>

</article>