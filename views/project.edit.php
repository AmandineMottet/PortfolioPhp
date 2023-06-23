<div class="container">
    <div class="row mb-5 mt-3">
        <div class="col-md-12  titleBackgroundBlueSmaller pt-2 ms-3 ps-1 text-center">
            <h4>Edit project</h4>
        </div>
    </div>
    <div class="card card-body">
        <form action="/project/<?= $project->id ?>/update" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="title" class="form-label boldFont">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $project->title ?>">
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label boldFont">Date de réalisation</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="<?= $project->date ?>">
                </div>
                <div class="col-md-4">
                    <label for="category_id" class="form-label boldFont">Catégorie</label>
                    <select class="form-select" name="category_id">
                        <?php foreach ($categories as $category): ?>
                            <option <?= $project->category_id === $category['id'] ? 'selected' : null ?>
                                    value="<?= $category['id'] ?> "><?= $category['label'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label boldFont">Sélectionner des images</label>
                        <input type="file" class="form-control" id="formFileMultiple" name="images[]" multiple>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($project->images() as $image): ?>
                    <div class="col-2">
                        <div class="img-wrapper">
                            <a href="/image/<?= $image->id ?>/delete" class="btn btn-sm btn-danger btn-image">
                                <i class="fa fa-times"></i>
                            </a>
                            <img src="<?= $image->path ?>" alt="<?= $image->name ?>" class="img-fluid">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-end pe-3">
                    <button type="submit" class="btn btn-success btn-sm titleSmallerSize">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>
