<!--HEADER-->
<div class="dashhead">
    <div class="dashhead-titles">
        <h2 class="dashhead-title">Ajouter une note à un élève</h2>
        <h6 class="dashhead-subtitle">Bien saisir le bon format de date. Merci</h6>
    </div>
</div>

<div class="content">
    <div class="hr-divider">
        <h3 class="hr-divider-content hr-divider-heading"><?= $this->Flash->render() ?></h3>
    </div>

    <!--DEBUT FORMULAIRE-->
    <?php $this->Form->templates([
        'inputContainer' => '{{content}}'
    ]);?>

    <h3><?= $eleve['nom'] . ' ' . $eleve['prenom'] ?></h3>
    <p>Né(e) le <?= $eleve['date_naissance'] ?></p>

    <?=$this->Form->create($eleve, ['class' => 'table-full"'])?>
    <?=$this->Form->control('id_eleve', ['type' => 'hidden'])?>

    <!--MATIERE-->
    <div class="input-group">
    <?=$this->Form->input(
        'matieres',
        [
            'type' => 'select',
            'label'=> ['Matières', 'class' => 'input-group-addon'],
            'options' => $matieres,
            'escape' => true,  // prevent HTML being automatically escaped
            'error' => false,
            'class' => 'form-control selectpicker'
        ]
    )?>
    </div>

    <!--DATE EXAMEN-->
    <div class="input-group">
        <span class="input-group-addon"><span class="icon icon-calendar"></span></span>
        <input type="text" name="date_note" placeholder="Ex.: 1990/02/20" class="form-control" style="width: 200px;">
    </div>

    <!--NOTE DE 1 à 20-->
    <div class="input-group">
    <?=$this->Form->input(
        'note',
        [
            'label' => ['Note sur 20', 'class' => 'input-group-addon'],
            'type' => 'number',
            'min' => 1,
            'max' => 20,
            'class' => 'form-control'
        ])?>
    </div>
    <div class="btn-group">
        <?=$this->Form->button(__('Ajouter note'), ['class' => 'btn btn-primary-outline'])?>
    </div>
    <?=$this->Form->end()?>

