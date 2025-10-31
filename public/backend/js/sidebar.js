
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const links = sidebar.querySelectorAll('.nav-link[data-toggle="collapse"]');

    links.forEach(link => {
        link.addEventListener('click', function () {
            links.forEach(other => {
                if (other !== link) {
                    other.classList.add('collapsed');
                    const target = document.querySelector(other.getAttribute('href'));
                    if (target) target.classList.remove('show');
                }
            });
        });
    });
});

