<!--HEADER-->
<div class="dashhead">
    <div class="dashhead-titles">
        <h2 class="dashhead-title">Gestion des élèves notes & matières</h2>
        <h6 class="dashhead-subtitle">Dans la rubrique "Action" cliquez sur chacun des liens pour voir le profile del'élève, l'éditer, lui ajouter une note ou le supprprimer de la base ...</h6>
    </div>
</div>

<div class="content">
    <div class="hr-divider">
        <h3 class="hr-divider-content hr-divider-heading"><?= $this->Flash->render() ?></h3>
    </div>

    <div class="table-full">
        <div class="table-responsive mcs-horizontal">
            <table class="table" data-sort="table">
                <caption><h3><?= $title ?></h3></caption>
                <?php
                    echo $this->Html->tableHeaders(['Elève', 'Action']);
                    foreach ($eleves as $eleve) {
                        echo $this->Html->tableCells(
                            [
                                $eleve['nom'] . ' ' . $eleve['prenom'] . ' né(e) le ' . $eleve['date_naissance'],
                                // Action Voir le profile détaillé d'un élève
                                $this->Html->link('',"/eleves/view/".$eleve['id_eleve'], ['class' => 'icon icon-eye', 'title' => 'Voir les détails du profil'])
                                // Action Editer un élève
                                . ' &nbsp; ' . $this->Html->link('',"/eleves/edit/".$eleve['id_eleve'], ['class' => 'icon icon-pencil', 'title' => 'Modifier les infos du profil'])
                                // Action Supprimer un élève
                                . ' &nbsp; ' . $this->Html->link('',"/eleves/del/".$eleve['id_eleve'], ['class' => 'icon icon-trash', 'title' => 'Supprimer le profil'])
                                // Action Ajouter une note
                                . ' &nbsp; ' . $this->Html->link('',"/eleves/new-note/".$eleve['id_eleve'], ['class' => 'icon icon-circle-with-plus', 'title' => 'Noter le profil'])
                            ]
                        );
                    }
                ?>
            </table>
        </div>
    </div>