<?php get_header(); ?>

<div class="container mx-auto">


<section>
        <div class="max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
            <div class="flex flex-wrap ">
                <div class="w-full mb-10 lg:w-1/2 lg:mb-0 ">
                    <div class="lg:max-w-md">
                        <div class="mb-6">
                            <h1 >
                                Sobre nós
                            </h1>
                        </div>
                        <p class="mb-10 text-base leading-7 text-gray-500 text-justify">
						<span class="italic text-primary">Receitas do Paraíso</span> é um canal, presente no Youtube, direcionado exclusivamente a receitas de culinária. 
						Foi criado no dia 5 de janeiro de 2017, sendo a sua protagonista principal a Fernanda Meneses. 
						Um dos nossos objetivos, é que as nossas receitas também fiquem registadas em livro.
                        Pode adquiri-los aqui. Também estão à venda no Google Play.
                        </p>
                        <div class="flex flex-wrap items-center">
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24"><path d="M17.997 18h-11.995l-.002-.623c0-1.259.1-1.986 1.588-2.33 1.684-.389 3.344-.736 2.545-2.209-2.366-4.363-.674-6.838 1.866-6.838 2.491 0 4.226 2.383 1.866 6.839-.775 1.464.826 1.812 2.545 2.209 1.49.344 1.589 1.072 1.589 2.333l-.002.619zm4.811-2.214c-1.29-.298-2.49-.559-1.909-1.657 1.769-3.342.469-5.129-1.4-5.129-1.265 0-2.248.817-2.248 2.324 0 3.903 2.268 1.77 2.246 6.676h4.501l.002-.463c0-.946-.074-1.493-1.192-1.751zm-22.806 2.214h4.501c-.021-4.906 2.246-2.772 2.246-6.676 0-1.507-.983-2.324-2.248-2.324-1.869 0-3.169 1.787-1.399 5.129.581 1.099-.619 1.359-1.909 1.657-1.119.258-1.193.805-1.193 1.751l.002.463z"/></svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400">+<?php echo do_shortcode('[rp_options key="rp_subscribers"]'); ?> mil
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Subscritores</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" class="h-14 w-14" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm.002 3c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5z" fill-rule="nonzero"/></svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400">+<?php echo do_shortcode('[rp_options key="rp_views"]'); ?>
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Visualizações</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                    <svg class="h-14 w-14" fill="currentColor" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M9 19.5l-.012-4.5h2.012l1 4.5 1-4.5h2.037l-.037 4.5 2-4.5h3l-3.556 9h-8.888l-3.556-9h3l2 4.5zm10.941-5.5h-15.878s-1.059-.64-1.059-2.154c0-1.853 1.612-3.156 3.176-3.231.77 1.469 3.117 2.435 5.293 2.154-2.507-.558-5.692-3.718-3.9-6.21 1.272-1.77 4.473-1.486 3.9-4.559 2.131.589 3.43 2.167 3.176 4.308h.002c2.104-.101 3.867 1.3 3.173 4.307 1.754 0 3.176 1.447 3.176 3.231 0 1.328-1.051 2.148-1.059 2.154z"/></svg>
                                    </span>                                    
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400"><?php echo $count_recipes = wp_count_posts( 'receitas' )->publish; ?>
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Receitas</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="currentColor" viewBox="0 0 24 24"><path d="M15 12h-10v1h10v-1zm-4 2h-6v1h6v-1zm4-6h-10v1h10v-1zm0 2h-10v1h10v-1zm0-6h-10v1h10v-1zm0 2h-10v1h10v-1zm7.44 10.277c.183-2.314-.433-2.54-3.288-5.322.171 1.223.528 3.397.911 5.001.089.382-.416.621-.586.215-.204-.495-.535-2.602-.82-4.72-.154-1.134-1.661-.995-1.657.177.005 1.822.003 3.341 0 6.041-.003 2.303 1.046 2.348 1.819 4.931.132.444.246.927.339 1.399l3.842-1.339c-1.339-2.621-.693-4.689-.56-6.383zm-6.428 1.723h-13.012v-16h14v7.894c.646-.342 1.348-.274 1.877.101l.123-.018v-8.477c0-.828-.672-1.5-1.5-1.5h-15c-.828 0-1.5.671-1.5 1.5v17c0 .829.672 1.5 1.5 1.5h13.974c-.245-.515-.425-1.124-.462-2z"/></svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400">5
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Livros</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10 lg:w-1/2 lg:mb-0">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/home/youtube.png'); ?>" alt="Fernanda Meneses"
                        class="relative object-cover w-full h-full rounded">
                </div>
            </div>
        </div>
    </section>



	<!-- <section class="flex items-center bg-stone-100 xl:h-screen font-poppins dark:bg-gray-800 "> -->
        <section class="justify-center flex-1 py-4 mx-auto lg:py-6">
            <div class="flex flex-wrap ">
                <div class="w-full mb-10 lg:w-1/2 lg:mb-0">
                    <div class="relative lg:max-w-md">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/home/hero-img.png'); ?>" alt="Fernanda Meneses"
                            class="relative object-cover h-full rounded-full">
                    </div>
                </div>
                <div class="w-full px-6 mb-10 lg:w-1/2 lg:mb-0 ">
                    <div class="mb-6">
						<h1>Fernanda Meneses</h1>
                    </div>

                    <p class="mb-6 text-base leading-7 text-gray-500 text-justify">
						Desde muito cedo, fui e sou uma apaixonada por culinária. Sempre investiguei, estudei, li, e procurei saber cada vez mais, 
						sobre a boa comida à nossa mesa. Gosto muito de criar receitas novas e que sejam sempre saborosas, simples e saudáveis. 
						Em todas as minhas receitas, procuro dentro do possível, evitar ao máximo o açúcar, o sal e a gordura. 
                    </p>
                    <p class="mb-6 text-base leading-7 text-gray-500 text-justify">
						Certo dia, concretizei um dos meus sonhos: o canal “Receitas do Paraíso“. 
						Com ele, quero partilhar o que sei, pois se assim não fosse, o que sei, não existia. 
						Para além da culinária, sou apaixonada por flores, especialmente, por orquídeas. 
                    </p>
                    <p class="mb-6 text-base leading-7 text-gray-500 text-justify">
                        Com um grande abraço.
                    </p>
                    <p class="mb-6 text-base leading-7 text-gray-500 text-justify">
                        Fernanda Meneses
                    </p>
                </div>
            </div>
        </section>
    <!-- </section> -->


	<!-- TEAM -->

	<section class="flex items-center pt-20">
        <div class="justify-center flex-1 py-6 mx-auto max-w-7xl lg:py-4 md:px-6">
            <div class="text-center mb-14">
                <span
                    class="block mb-4 text-xs font-semibold leading-4 tracking-widest text-center text-primary uppercase">
                    Conheça a Nossa Equipa
                </span>
                <h1 class="text-3xl font-bold capitalize dark:text-white pt-0 text-center"> Por trás das câmaras </h1>
            </div>
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/jose-meneses.png'); ?>" alt="José Meneses">
                        </div>
						<h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">José Meneses</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Operador de câmara / Editor de vídeo
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="https://www.shutterstock.com/g/meneses5" target="_blank">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 17C12 17.5523 12.4477 18 13 18H17C17.5523 18 18 17.5523 18 17V13C18 12.4477 17.5523 12 17 12H16V16H12V17Z" fill="#FF1A03"/>
                                    <path d="M11 6C11.5523 6 12 6.44772 12 7V8H8V12H7C6.44772 12 6 11.5523 6 11V7C6 6.44772 6.44772 6 7 6H11Z" fill="#FF1A03"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H19C20.6569 22 22 20.6569 22 19V5C22 3.34315 20.6569 2 19 2H5ZM19 4H5C4.44771 4 4 4.44772 4 5V19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V5C20 4.44771 19.5523 4 19 4Z" fill="#FF1A03"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/diogo-madeira.jpg'); ?>" alt="Diogo Madeira">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">Diogo Madeira</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Programador / Designer
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="https://www.linkedin.com/in/diogomadeiradev" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                                    <path fill="#0288D1" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"></path><path fill="#FFF" d="M12 19H17V36H12zM14.485 17h-.028C12.965 17 12 15.888 12 14.499 12 13.08 12.995 12 14.514 12c1.521 0 2.458 1.08 2.486 2.499C17 15.887 16.035 17 14.485 17zM36 36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698-1.501 0-2.313 1.012-2.707 1.99C24.957 25.543 25 26.511 25 27v9h-5V19h5v2.616C25.721 20.5 26.85 19 29.738 19c3.578 0 6.261 2.25 6.261 7.274L36 36 36 36z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/andre-meneses.jpg'); ?>" alt="André Meneses">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">André Meneses</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Compositor de música</span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="https://www.facebook.com/andremeneses55" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="https://www.youtube.com/@AndreMeneses" target="_blank">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="#FF0000"
                                    viewBox="0 0 24 24">
                                    <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/marta-meneses.jpg'); ?>" alt="Marta Meneses">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">Marta Meneses</h2>
                        <span
                            class="inline-block mb-6 text-base font-medium text-primary">Redatora
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="https://www.instagram.com/younique_travel_" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-pink-600 bi bi-instagram"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
