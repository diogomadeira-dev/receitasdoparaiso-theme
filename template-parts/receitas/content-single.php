<article id="post-<?php the_ID(); ?>">

    <div class="flex gap-10">

        <div class="flex-1">
            <?php if ( has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php else : ?>
                <img class="object-cover max-h-96 w-full border" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/img-placeholder.png' ); ?>" alt="img-placeholder" >
            <?php endif; ?>
        </div>


        <div class="flex-1">
            <header class="mb-4">
                <?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-4xl font-extrabold leading-tight capitalize-first-letter"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                <!-- <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time> -->
            </header>

            <div class="entry-content">
                <div class="tracking-wider text-sm leading-6">
                    <?php the_content(); ?>
                </div>

                
                <div class="flex justify-end">
                    <?php
                        $previous_recipe = get_previous_post();
                        if ($previous_recipe) :
                            $previous_recipe_url = get_permalink($previous_recipe);
                        ?>
                            <a href="<?php echo $previous_recipe_url; ?>">
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

