<div class="container card p-5">
    <div class="row">
        <div class="col-md-12 text-capitalize mb-2">
            <h3><?= $project->title ?></h3>
        </div>
    </div>

    <p> Finished <?= \Carbon\Carbon::parse($project->date)->diffForHumans() ?></p>
    <div class="mb-4">
        <?php
        if ($project->category_id === \App\Enums\Category::FRONT) {
            ?>
            <span class="badge rounded-pill categoryFront"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
            <?php
        }
        if ($project->category_id === \App\Enums\Category::BACKEND) {
            ?>
            <span class="badge rounded-pill categoryBack"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
            <?php
        }
        if ($project->category_id === \App\Enums\Category::CMS) {
            ?>
            <span class="badge rounded-pill categoryCms"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
            <?php
        }
        if ($project->category_id === \App\Enums\Category::DESIGN) {
            ?>
            <span class="badge rounded-pill categoryDesign"><?= \App\Enums\Category::getDescription($project->category_id) ?></span>
            <?php
        }
        ?>
    </div>
    <div>
        <?php foreach ($project->images() as $img): ?>
            <img src="<?= $img->path ?>" alt="Image Project" style="width: 800px">
        <?php endforeach; ?>
    </div>
    <div class="my-4">
        <button class="btn btn-primary"><a class="link-light" href="/">Home</a> </button>
        <button class="btn btn-primary"><a class="link-light" href="/project/index">List of projects</a> </button>

    </div>

</div>
