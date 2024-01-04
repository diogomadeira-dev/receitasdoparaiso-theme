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
                        $next_recipe = get_next_post();
                        if ($next_recipe) :
                            $next_recipe_url = get_permalink($next_recipe);
                        ?>
                            <div class="lg:tooltip" data-tip="Próxima receita">
                                <a href="<?php echo $next_recipe_url; ?>" data-tooltip-target="tooltip-default">
                                    <button class="btn btn-circle btn-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#383837" stroke-width="1.9285714285714286" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                                    </button>
                                </a>
                            </div>
                        <?php endif;
                        ?>

                        <?php                            
                        $previous_recipe = get_previous_post();
                        if ($previous_recipe) :
                            $previous_recipe_url = get_permalink($previous_recipe);
                        ?>
                            <div class="lg:tooltip" data-tip="Receita anterior">
                                <a href="<?php echo $previous_recipe_url; ?>">
                                    <button class="btn btn-circle btn-outline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#383837" stroke-width="1.9285714285714286" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                    </button>
                                </a>
                            </div>
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
                            <a href="<?php echo '/categoria/' . $category->slug ?>">
                                <span class="badge hover:bg-primary/60"><?php echo $category->name ?></span>
                            </a>	
                        <?php } ?>
                    <?php endif; ?>

                    <?php 
                    $url = urlencode(get_permalink());
                    $title = str_replace(' ', '%20', get_the_title());
                
                    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
                    $instagram_url = 'https://www.instagram.com/diogomadeira10?url=' . $url;
                    $whatsapp_url = 'https://api.whatsapp.com/send/?text=' . $title . ' ' . $url;
                    $twitter_url = 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title;

                    ?>

                    <div class="lg:tooltip" data-tip="Partilhar no facebook">
                        <a href="<?php echo $facebook_url; ?>" target="_blank">
                            <div class="badge-social">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </div>
                        </a>
                    </div>
                    <div class="lg:tooltip" data-tip="Partilhar no whatsapp">
                        <a href="<?php echo $whatsapp_url; ?>" target="_blank">
                            <div class="badge-social">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"><path fill-rule="evenodd" d="M 24.503906 7.503906 C 22.246094 5.246094 19.246094 4 16.050781 4 C 9.464844 4 4.101563 9.359375 4.101563 15.945313 C 4.097656 18.050781 4.648438 20.105469 5.695313 21.917969 L 4 28.109375 L 10.335938 26.445313 C 12.078125 27.398438 14.046875 27.898438 16.046875 27.902344 L 16.050781 27.902344 C 22.636719 27.902344 27.996094 22.542969 28 15.953125 C 28 12.761719 26.757813 9.761719 24.503906 7.503906 Z M 16.050781 25.882813 L 16.046875 25.882813 C 14.265625 25.882813 12.515625 25.402344 10.992188 24.5 L 10.628906 24.285156 L 6.867188 25.269531 L 7.871094 21.605469 L 7.636719 21.230469 C 6.640625 19.648438 6.117188 17.820313 6.117188 15.945313 C 6.117188 10.472656 10.574219 6.019531 16.054688 6.019531 C 18.707031 6.019531 21.199219 7.054688 23.074219 8.929688 C 24.949219 10.808594 25.980469 13.300781 25.980469 15.953125 C 25.980469 21.429688 21.523438 25.882813 16.050781 25.882813 Z M 21.496094 18.445313 C 21.199219 18.296875 19.730469 17.574219 19.457031 17.476563 C 19.183594 17.375 18.984375 17.328125 18.785156 17.625 C 18.585938 17.925781 18.015625 18.597656 17.839844 18.796875 C 17.667969 18.992188 17.492188 19.019531 17.195313 18.871094 C 16.894531 18.722656 15.933594 18.40625 14.792969 17.386719 C 13.90625 16.597656 13.304688 15.617188 13.132813 15.320313 C 12.957031 15.019531 13.113281 14.859375 13.261719 14.710938 C 13.398438 14.578125 13.5625 14.363281 13.710938 14.1875 C 13.859375 14.015625 13.910156 13.890625 14.011719 13.691406 C 14.109375 13.492188 14.058594 13.316406 13.984375 13.167969 C 13.910156 13.019531 13.3125 11.546875 13.0625 10.949219 C 12.820313 10.367188 12.574219 10.449219 12.390625 10.4375 C 12.21875 10.429688 12.019531 10.429688 11.820313 10.429688 C 11.621094 10.429688 11.296875 10.503906 11.023438 10.804688 C 10.75 11.101563 9.980469 11.824219 9.980469 13.292969 C 9.980469 14.761719 11.050781 16.183594 11.199219 16.382813 C 11.347656 16.578125 13.304688 19.59375 16.300781 20.886719 C 17.011719 21.195313 17.566406 21.378906 18 21.515625 C 18.714844 21.742188 19.367188 21.710938 19.882813 21.636719 C 20.457031 21.550781 21.648438 20.914063 21.898438 20.214844 C 22.144531 19.519531 22.144531 18.921875 22.070313 18.796875 C 21.996094 18.671875 21.796875 18.597656 21.496094 18.445313 Z"></path></svg>
                            </div>
                        </a>
                    </div>
                    <div class="lg:tooltip" data-tip="Partilhar no twitter">
                        <a href="<?php echo $twitter_url; ?>" target="_blank">
                            <div class="badge-social">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </div>
                        </a>
                    </div>
                    <!-- <a href="<?php echo $instagram_url; ?>" target="_blank">
                        <div class="badge-social">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>                   
                        </div>
                    </a> -->
                    <!-- <div class="badge-social">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>                    
                    </div> -->
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

    <div class="py-6">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3405549652085163"
            crossorigin="anonymous"></script>
        <!-- bloco single receitas -->
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="ca-pub-3405549652085163"
            data-ad-slot="6253740518"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

</article>