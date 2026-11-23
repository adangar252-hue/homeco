<?php
require '../config/db.php';

$pageTitle = 'HOMCO - Home';

require '../config/header.php';
?>

<section class="hero">

    <div>

        <div class="eyebrow">WELCOME TO HOMCO</div>

        <h1>
            BUILD YOUR<br>
            ELEGAN DREAM<br>
            HOME INTERIOR
        </h1>

        <p>
            Elegant home interior planning, consultation and decoration
            for modern living.
        </p>

        <a class="btn" href="projects.php">
            OUR PROJECT
        </a>

    </div>

    <img src="../assets/images/img12.jpeg">

</section>

<div class="cards">

    <div class="card green">

        <h3>
            HOME DESIGN<br>
            CONSULTATION
        </h3>

        <p>
            Professional planning for your dream home.
        </p>

        ➜

    </div>

    <div class="card">

        <h3>
            HOME DESIGN 3D 2D<br>
            INTERIOR SERVICE
        </h3>

        <p>
            Visualize your space before execution.
        </p>

        ➜

    </div>

    <div class="card green">

        <h3>
            HOME DESIGN<br>
            CONSULTATION
        </h3>

        <p>
            Complete interior guidance and support.
        </p>

        ➜

    </div>

</div>

<section class="section split">

    <img src="../assets/images/img15.jpeg">

    <div>

        <div class="eyebrow">WHO WE ARE</div>

        <h2>
            WE ARE PERFECT TEAM FOR HOME INTERIOR DECORATION
        </h2>

        <p>
            We create practical, elegant and comfortable spaces with a
            strong focus on client needs and quality.
        </p>

        <div class="checks">

            <span>✓ Flexible Time</span>
            <span>✓ Flexible Time</span>
            <span>✓ Perfect Work</span>
            <span>✓ Perfect Work</span>
            <span>✓ Client Priority</span>
            <span>✓ Client Priority</span>

        </div>

        <div class="stats">

            <div>
                <b>15Y</b>
                <small>EXPERIENCE</small>
            </div>

            <div>
                <b>25+</b>
                <small>BEST TEAM</small>
            </div>

            <div>
                <b>500+</b>
                <small>TOTAL CLIENT</small>
            </div>

        </div>

    </div>

</section>

<section class="section">

    <div class="eyebrow">HOW WE WORK</div>

    <h2>OUR WORK PROCEDURE</h2>

    <div class="steps">

        <div class="step">

            <h3>💬 CLIENT DESIGN CONSULTATION</h3>

            <p>
                Discuss requirements and ideas.
            </p>

        </div>

        <div class="step">

            <h3>🛠 PROTOTYPING HOME DESIGN</h3>

            <p>
                Prepare design concepts and visuals.
            </p>

        </div>

        <div class="step">

            <h3>⌂ PROCESSING TO DESIGN HOME</h3>

            <p>
                Turn the approved concept into reality.
            </p>

        </div>

    </div>

</section>

<section class="section">

    <div class="gallery">

        <?php
        foreach (
            [
                'img13.jpeg',
                'img7.jpeg',
                'img11.jpeg',
                'img16.jpeg',
                'img2.jpeg'
            ] as $im
        ):
        ?>

            <img src="../assets/images/<?= $im ?>">

        <?php endforeach; ?>

    </div>

</section>

<section class="section split">

    <div>

        <div class="eyebrow">PERFECT PARTNER</div>

        <h2>
            WE HAVE PRIORITY FOR CAN CREATE DREAM HOME DESIGN
        </h2>

        <p>
            From planning to finishing, we focus on creating a space
            that feels like your own.
        </p>

        <a class="btn" href="portfolio.php">
            PORTFOLIO
        </a>

    </div>

    <img src="../assets/images/img24.jpeg">

</section>

<section class="section split">

    <img src="../assets/images/img17.jpeg">

    <div>

        <div class="eyebrow">TRUST US NOW</div>

        <h2>
            WHY CHOICE OUR HOME DESIGN INTERIOR SERVICES
        </h2>

        <div class="checks">

            <span>✓ Flexible Time</span>
            <span>✓ Flexible Time</span>
            <span>✓ Perfect Work</span>
            <span>✓ Perfect Work</span>
            <span>✓ Client Priority</span>
            <span>✓ Client Priority</span>

        </div>

    </div>

</section>

<section class="section split">

    <div>

        <div class="eyebrow">CLIENTS FEEDBACK</div>

        <h2>
            OUR TESTIMONIAL FROM BEST CLIENTS
        </h2>

        <p>
            Our clients trust us to turn their ideas into beautiful spaces.
        </p>

    </div>

    <div class="testi">

        <b>★★★★★</b>

        <p>
            Excellent planning, beautiful execution and a very professional team.
        </p>

        <strong>John De</strong>

        <small>ART DIRECTOR</small>

    </div>

</section>

<?php
require '../config/footer.php';
?>