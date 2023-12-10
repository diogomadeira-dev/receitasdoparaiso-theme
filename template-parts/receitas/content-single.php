<?php require get_stylesheet_directory() . '/utils.php'; ?>

<article id="post-<?php the_ID(); ?>">

    <div class="lg:flex gap-10">

        <div class="flex-1 overflow-hidden">
            <?php $post_thumbnail = get_field('imagem', get_the_ID()); ?>
            <?php if ($post_thumbnail) : ?>
                <img class="hover:scale-125 transition duration-500 object-cover" src="<?php echo $post_thumbnail['guid']; ?>">   
            <?php else : ?>
                <img class="object-cover max-h-96 w-full border" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/img-placeholder.png'); ?>" alt="img-placeholder">
            <?php endif; ?>
        </div>

        <div class="flex-1">
            <header class="mb-6 mt-10 lg:mt-0">
                <div class="flex justify-between">
                <?php the_title(sprintf('<h1 class="entry-title text-2xl lg:text-4xl font-extrabold leading-tight capitalize-first-letter mb-4">', esc_url(get_permalink())), '</h1>'); ?>

                    <div class="flex justify-end gap-2">
                        <?php
                        $previous_recipe = get_previous_post();
                        if ($previous_recipe) :
                            $previous_recipe_url = get_permalink($previous_recipe);
                        ?>
                            <a href="<?php echo $previous_recipe_url; ?>" data-tooltip-target="tooltip-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#383837" stroke-width="1.9285714285714286" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                            </a>
                        <?php endif;
                        ?>

                        <?php
                        $next_recipe = get_next_post();
                        if ($next_recipe) :
                            $next_recipe_url = get_permalink($next_recipe);
                        ?>
                            <a href="<?php echo $next_recipe_url; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#383837" stroke-width="1.9285714285714286" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </a>
                        <?php endif;
                        ?>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">

                    <?php 
                        $categories = get_the_terms( get_the_ID(), 'categoria' );

                        if ($categories) : 
                            foreach ($categories as $category) {
                        ?>
                            <span class="badge"><?php echo $category->name ?></span>
                        <?php } ?>
                    <?php endif; ?>


                    <div class="badge-social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </div>
                    <div class="badge-social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>                   
                    </div>
                    <div class="badge-social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                    </div>
                    <div class="badge-social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>                    
                    </div>
                </div>
            </header>

            <div class="entry-content">
                <div class="tracking-wider text-sm leading-6">
                    <?php the_content(); ?>
                </div>

                <div class="flex gap-10 py-10">
                    <?php $level = get_post_meta( get_the_ID(), "selecionar_dificuldade", true ); 

                    $levelOne = 'Muito Fácil';
                    $levelTwo = 'Fácil';
                    $levelThree = 'Intermédio';
                    $levelFour = 'Difícil';
                    $levelFive = 'Muito Difícil';

                    switch (true) {
                        case $level === $levelOne:
                            $isConditionMet = 1;
                            break;
                        case $level === $levelTwo:
                            $isConditionMet = 2;
                            break;
                        case $level === $levelThree:
                            $isConditionMet = 3;
                            break;
                        case $level === $levelFour:
                            $isConditionMet = 4;
                            break;
                        case $level === $levelFive:
                            $isConditionMet = 5;
                            break;
                        default:
                            $isConditionMet = 0;
                            break;
                    }

                    ?> 
                    
                    <?php if ($isConditionMet !== 0) : ?>
                        <div class="flex align-top flex-col">
                            <span class="text-xs text-muted font-medium">Dificuldade</span>
                            <div class="flex gap-1 mt-1">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <div class="w-2 h-2 <?php echo $isConditionMet > $i ? 'bg-primary' : 'bg-neutral-300'; ?> rounded-full"></div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $preparationTime = get_post_meta( get_the_ID(), "tempo_de_preparacao", true ); ?>
                    <?php if ($preparationTime) : ?>
                        <div class="flex align-top flex-col">
                            <span class="text-xs text-muted font-medium">Tempo de preparação</span>
                            <small class="text-xs font-medium"><?php echo convertToHourFormat($preparationTime); ?></small>
                        </div>
                    <?php endif; ?>    

                    <?php $totalTime = get_post_meta( get_the_ID(), "tempo_total", true ); ?>
                    <?php if ($totalTime) : ?>
                        <div class="flex align-top flex-col">
                            <span class="text-xs text-muted font-medium">Tempo total</span>
                            <small class="text-xs font-medium"><?php echo convertToHourFormat($totalTime); ?></small>
                        </div>
                    <?php endif; ?>   

                    <?php $portions = get_post_meta( get_the_ID(), "porcoes", true ); ?>
                    <?php if ($portions) : ?>
                        <div class="flex align-top flex-col">
                            <span class="text-xs text-muted font-medium">Porções</span>
                            <small class="text-xs font-medium"><?php echo $portions; ?></small>
                        </div>
                    <?php endif; ?>   

                </div>

                <?php $url = get_post_meta(get_the_ID(), 'link_yt', true); ?>

                <?php if (!empty($url)) { ?>
                    <a role="button" class="btn btn-primary" href="<?php echo esc_url($url); ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg>
                    Ver vídeo
                </a>
                <?php } ?>
            
            </div>
        </div>
    </div>

</article>