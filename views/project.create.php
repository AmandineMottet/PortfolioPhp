

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-5 mt-5 titleBackgroundBlueSmaller pt-2 ms-3 ps-2 text-center">
            <h4>New project</h4>
        </div>
    </div>
    <div class="card card-body">
        <form action="/project/store" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="title" class="form-label boldFont">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label boldFont">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date">
                </div>
                <div class="col-md-4">
                    <label for="category_id" class="form-label boldFont">Category</label>
                    <select class="form-select " name="category_id">
                        <option selected value="">Select a category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id']?> "><?= $category['label']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label boldFont">Select images</label>
                        <input type="file" class="form-control" id="formFileMultiple" name="images[]" multiple>
                    </div>
                </div>
                <div class="row pe-0">
                    <div class="col-md-12 text-end pe-0">
                        <button type="submit" class="btn btn-success titleSmallerSize">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
