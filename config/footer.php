
<section class="cta">
    <div>
        <h2>
            LETS CHANGE YOUR OWN HOME<br>
            INTERIOR DESIGN NOW
        </h2>

        <a class="btn dark" href="../guest/contact.php">
            CONTACT US
        </a>
    </div>
</section>

<footer>
    <div>
        <b>INFORMATION</b>
        <p>
            Professional home interior design, planning and decoration services.
        </p>
    </div>

    <div>
        <b>NAVIGATION</b>
        <p>
            <a href="../guest/index.php">Homepage</a><br>
            <a href="../guest/about.php">About Us</a><br>
            <a href="../guest/services.php">Services</a><br>
            <a href="../guest/projects.php">Projects</a>
        </p>
    </div>

    <div>
        <b>CONTACT US</b>
        <p>
            📍 Rajkot, Gujarat<br>
            ✉ hello@homco.com
        </p>

        <form action="../guest/subscribe.php" method="post">
            <input
                name="email"
                type="email"
                placeholder="Email Address"
                required
            >
            <button type="submit">SUBSCRIBE</button>
        </form>
    </div>

    <div class="copyright">
        ALLRIGHT RESERVED - HOMCO INTERIOR

        <span>
            DISCLAIMER &nbsp;
            PRIVACY POLICY &nbsp;
            TERM OF USE
        </span>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menuToggle');
    const nav = document.querySelector('.topbar nav');

    if (!menuToggle || !nav) {
        return;
    }

    function updateMenu() {
        if (window.innerWidth <= 800) {
            nav.classList.remove('menu-open');
            nav.classList.add('menu-closed');
            menuToggle.setAttribute('aria-expanded', 'false');
        } else {
            nav.classList.remove('menu-open', 'menu-closed');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    }

    menuToggle.addEventListener('click', function () {
        const isOpen = nav.classList.contains('menu-open');

        nav.classList.toggle('menu-open', !isOpen);
        nav.classList.toggle('menu-closed', isOpen);

        menuToggle.setAttribute(
            'aria-expanded',
            String(!isOpen)
        );
    });

    window.addEventListener('resize', updateMenu);

    updateMenu();
});
</script>

</body>
</html>
