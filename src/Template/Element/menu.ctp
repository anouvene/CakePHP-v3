<ul class="nav nav-pills nav-stacked">
    <!--REQUEST LIST-->
    <li class="nav-header icon icon-text-document-inverted"> Liste des élèves</li>
    <li class="active">
        <?= $this->Html->link('Voir les élèves', '/eleves/') ?>
    </li>

    <!--NEW REQUEST-->
    <li class="nav-header icon icon-text-document"> Ajouter un élève</li>
    <li>
        <?= $this->Html->link('Ajouter un élève', '/eleves/new') ?>
    </li>

    <!--STATISTIQUES-->
    <li class="nav-header icon icon icon-bar-graph"> Classemnts & stats</li>
    <li>
        <a href="#" title="Profil" class="icon icon icon-bar-graph"> Voir les stats</a>
    </li>

    <!--SETTINGS-->
    <li class="nav-header icon icon-add-user"> Votre profil</li>
    <li>
        <a href="#" title="Profil" class="icon icon-graduation-cap"> Voir vos notes</a>
    </li>
    <li>
        <a href="#" title="Profil" class="icon icon-mail"> Vos coordonnées</a>
    </li>

    <!--LOG IN/OUT-->
    <li>
        <a href="#" title="Logout" class="icon icon-log-out"> Logout</a>
    </li>
</ul>