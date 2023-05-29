

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Création de projet</h4>
        </div>
    </div>
    <form action="/project/store" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label">Date de réalisation</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
            <div class="col-md-4">
                <label for="category_id" class="form-label">Catégorie</label>
                <select class="form-select" name="category_id">
                    <option selected>Sélectionnez une catégorie</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id']?> "><?= $category['label']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Sélectionner des images</label>
                    <input type="file" class="form-control" id="formFileMultiple" name="images[]" multiple>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
                </div>
            </div>
        </div>
    </form>
</div>
