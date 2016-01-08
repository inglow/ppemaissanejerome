<?php $this->titre = "Mon Blog"; ?>
<h1>Bienvenue sur le site supremcoach</h1>
<h4>Nous somme une entreprise de coach sportif, elle contient 5 coach , Jessica qui s’occupe de l’aquagym du cours de musculation pour femme, Thierry qui s’occupe de la musculation et du crossfit, sarah des cours de fitness, Patrice du yoga, et john du cours de ZUMBA.
Elle a été crée en 2010 par un  Coach sportif de profession et deux autres amis s'etant rencontres a l'em-lyon John, elsa, et Thierry.
Nous sommes la seule enseigne sportive qui  propose des cours personnels a coût réduit.</h4>
<?php foreach ($billets as $billet):
    ?>
    <article>
       
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>
