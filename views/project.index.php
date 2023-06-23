

<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mt-3 ">
            <h4 class="titleBackgroundBlueSmaller pt-2 ms-1">List of projects</h4>
            <a href="/project/create" class="btn btn-dark btn-sm btnCreate">
                <i class="fa fa-plus me-2"></i>
                New project</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="colmd-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="tableTitleBackground">
                    <td class="tableTitle">Title</td>
                    <td class="tableTitle">Category</td>
                    <td class="tableTitle">Date</td>
                    <td class="tableTitle">Action</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projects as $project):?>
                <tr>
                    <td class="fw-bold text-capitalize align-middle"><?= $project->title ?></td>
                    <td class="align-middle">
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
                    <td class="align-middle"><?= \Carbon\Carbon::parse($project->date)->diffForHumans()  ?></td>
                    <td class="align-middle">
                            <a class="btn btn-sm btn-primary" href="/project/<?= $project->id ?>/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="/project/<?= $project->id ?>/delete">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <a class="btn btn-sm btn-success" href="/project/<?= $project->id ?>/view">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>