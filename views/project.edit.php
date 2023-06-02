<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Edition de projet</h4>
        </div>
    </div>
    <form action="/project/<?= $project->id ?>/update" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label" for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $project->title ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="date">Date de réalisation</label>
                <input type="datetime-local" class="form-control" id="date" name="date" value="<?= $project->date ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="category_id">Catégorie</label>
                <select class="form-select" name="category_id">
                    <option>Sélectionner une catégorie</option>
                    <?php
                    /** @var array $categories */
                    foreach ($categories as $category): ?>
                        <option
                            <?= $category['id'] === $project->category_id ? 'selected' : null?>
                                value="<?= $category['id'] ?>"
                        ><?= $category['label'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="images" class="form-label">Sélectionner des images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($project->images() as $image): ?>
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
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </div>
    </form>
</div>