<!--HEADER-->
<div class="dashhead">
    <div class="dashhead-titles">
        <h2 class="dashhead-title">Fiche détaillée d'un élève</h2>
        <h6 class="dashhead-subtitle">Historique des devoirs</h6>
    </div>
</div>

<div class="content">
    <div class="hr-divider">
        <h3 class="hr-divider-content hr-divider-heading"><?= $this->Flash->render() ?></h3>
    </div>

<!--DEBUT CONTENT-->
<h3><?= $eleve['nom'] . ' ' . $eleve['prenom'] ?></h3>
<p>Né(e) le <?= $eleve['date_naissance'] ?></p>

<?php if(!empty($eleveMatiereNote)): ?>
<div class="table-full">
    <div class="table-responsive mcs-horizontal">
        <table class="table" data-sort="table">
            <caption><h3>Relevé de note(s)</h3></caption>
            <?php
                echo $this->Html->tableHeaders(['Matière', 'Note', 'Date']);
                foreach ($eleveMatiereNote as $value) {
                    echo $this->Html->tableCells(
                        [
                            // Matiere
                            $value['matieres']['nom_matiere'],
                            // Note
                            $value['note'],
                            // Date note
                            $value['date_note']
                        ]
                    );
                }
            ?>
        </table>
    </div>
</div>
<?php endif; ?>