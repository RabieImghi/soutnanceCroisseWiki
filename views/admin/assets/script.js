var togl_menu = document.getElementById('togl_menu');
var asideBar = document.getElementById('asideBar');
var navLinks = document.querySelectorAll('.nav-link span.ml-2');

togl_menu.addEventListener('click', function () {
    asideBar.classList.toggle('collapsed');
    navLinks.forEach(function (link) {
        link.style.display = (asideBar.classList.contains('collapsed')) ? 'none' : 'inline';
    });
});
