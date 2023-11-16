// Navigation toggle
// window.addEventListener('load', function () {
//       let main_navigation = document.querySelector('#primary-menu');
//       document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
//             e.preventDefault();
//             main_navigation.classList.toggle('hidden');
//       });
// });

document.addEventListener("DOMContentLoaded", function () {
    var element = document.getElementById("scrollHeader");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 0) {
            element.classList.remove("shadow-none");
            element.classList.add("shadow"); 
        } else {
            element.classList.remove("shadow");
            element.classList.add("shadow-none");
        }
    });
});