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
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="w-10 h-10"
                                            fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            <path fill-rule="evenodd"
                                                d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                        </svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400">+250 mil
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Subscritores</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="w-10 h-10"
										fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
										<path
											d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
										<path
											d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
									</svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400">+30,000,000
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Visualizações</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="w-10 h-10"
                                            fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </span>
                                    <p class="mt-4 mb-2 text-3xl font-bold text-gray-700 dark:text-gray-400"><?php echo $count_recipes = wp_count_posts( 'receitas' )->publish; ?>
                                    </p>
                                    <h2 class="text-sm text-gray-700 dark:text-gray-400">Receitas</h2>
                                </div>
                            </div>
                            <div class="w-full mb-6 sm:w-1/2 md:w-1/2 lg:mb-6">
                                <div class="p-6 bg-white dark:bg-gray-900">
                                    <span class="text-primary dark:text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="w-10 h-10"
                                            fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                        </svg>
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
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/jose-meneses.png'); ?>" alt="">
                        </div>
						<h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">José Meneses</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Operador de câmara / Editor de vídeo
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="https://www.shutterstock.com/g/meneses5">
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
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/team/diogo-madeira.jpg'); ?>" alt="">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">Diogo Madeira</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Programador / Designer
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-primary bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="#">
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
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="https://i.postimg.cc/05hmHMx1/pexels-emmy-e-2381069.jpg" alt="">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">André Meneses</h2>
                        <span class="inline-block mb-6 text-base font-medium text-primary">Compositor de música</span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-primary bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="#">
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
                <div class="w-full mb-10 sm:w-1/2 lg:w-1/3 xl:w-1/4 ">
                    <div class="mx-auto text-center ">
                        <div
                            class="inline-block mb-3 overflow-hidden text-xs rounded-full w-44 h-44 sm:w-64 sm:h-64">
                            <img class="object-cover w-full h-full transition-all hover:scale-110"
                                src="https://i.postimg.cc/bNyr5cJq/pexels-anastasia-shuraeva-5704720.jpg" alt="">
                        </div>
                        <h2 class="mb-2 text-xl font-semibold text-gray-800 dark:text-gray-300">Marta Meneses</h2>
                        <span
                            class="inline-block mb-6 text-base font-medium text-primary">Redatora
                        </span>
                        <div class="flex items-center justify-center">
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-blue-800 bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                            <a class="inline-block mr-5 text-coolGray-300 hover:text-coolGray-400" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="w-6 h-6 text-primary bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                            <a class="inline-block text-coolGray-300 hover:text-coolGray-400" href="#">
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
