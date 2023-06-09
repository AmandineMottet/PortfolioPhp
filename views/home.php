<div class="backgroundBox">
    <div class="whiteRound"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-5 d-flex flex-column align-items-start">
            <div>
                <p class="titleBigSize mt-xl-5">Hello, I'm</p>
                <p class="titleBigSize mb-xl-5">Amandine</p>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="textFontSize">New to the world of</p>
                <p class="titleSmallSize pinkBoxAnimated">Webdesign</p>
                <p class="textFontSize mb-5">I'm eager to learn</p>
            </div>
        </div>
        <div class="col-7">
            <img class="imgAbsolute" width="1100px" src="/images/imagesprojet/avatar.png" alt="Avatar">
        </div>
    </div>
</div>
<div class="">
    <div class="titleBackgroundBlue mb-5">
        <p class="row titleMiddleSize mt-5 ms-xxl-5 pt-5">Last projects</p>
    </div>
    <div class="d-flex justify-content-evenly">
        <?php foreach ($projects as $project): ?>
            <div class="card" style="width: 500px;">
                <img src="<?= $project->images()[0]->path ?>" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column justify-content-start">
                    <h5 class="card-title mt-4 text-capitalize"> <?= $project->title ?> </h5>
                    <p class="card-text"><?= \Carbon\Carbon::parse($project->date)->diffForHumans() ?></p>
                    <p>
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
                    <div>
                        <a href="/project/<?= $project->id ?>/view" class="btn btn-primary">
                            <i class="fa-regular fa-eye"></i>
                            Check project
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
