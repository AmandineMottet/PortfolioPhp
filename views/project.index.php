

<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mt-3">
            <h4>Liste des projets</h4>
            <a href="/project/create" class="btn btn-dark btn-sm btnCreate">
                <i class="fa fa-plus me-2"></i>
                Nouveau projet</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="colmd-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="tableTitleBackground">
                    <td class="tableTitle">Titre</td>
                    <td class="tableTitle">Catégorie</td>
                    <td class="tableTitle">Date</td>
                    <td class="tableTitle">Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php \Carbon\Carbon::setLocale('fr'); ?>
                <?php foreach ($projects as $project):?>
                <tr>
                    <td class="fw-bold text-capitalize"><?= $project->title ?></td>
                    <td>
                        <?php
                        if ($project->category_id === \App\Enums\Category::FRONT){
                            ?>
                            <span class="badge rounded-pill categoryFront"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
                        <?php
                        }
                        if ($project->category_id === \App\Enums\Category::BACKEND){
                            ?>
                            <span class="badge rounded-pill categoryBack"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
                        <?php
                        }
                        if ($project->category_id === \App\Enums\Category::CMS){
                            ?>
                            <span class="badge rounded-pill categoryCms"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
                        <?php
                        }
                        if ($project->category_id === \App\Enums\Category::DESIGN){
                        ?>
                        <span class="badge rounded-pill categoryDesign"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
                        <?php
                        }
                        ?>
                    </td>
                    <td><?= \Carbon\Carbon::parse($project->date)->diffForHumans()  ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="/project/<?= $project->id ?>/edit">
                            <i class="fa fa-edit me-2"></i> Modifier
                        </a>
                        <br>
                        <a class="btn btn-sm btn-danger mt-1" href="/project/<?= $project->id ?>/delete">
                            <i class="fa-solid fa-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>