<?php
include 'src/templates/header.tpl.php';
?>
<main>
    <article>
        <h2><?= $title; ?></h2>
    </article>
    <section>
        <p>Nombre Usuario: <?= $username ?></p>
        <p>Correo electronico: <?= $email ?></p>
    </section>
</main>
<?php
include 'src/templates/footer.tpl.php';
