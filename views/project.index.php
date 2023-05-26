<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mt-3">
            <h4>Liste des projets</h4>
            <a href="/project/create" class="btn btn-primary btn-sm">
                <i class="fa fa-plus me-2"></i>
                Créer un nouveau projet
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Catégorie</td>
                    <td>Créé depuis</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php \Carbon\Carbon::setLocale('fr'); ?>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->id ?></td>
                    <td><?= $project->title ?></td>
                    <td><?= \App\Enums\Category::getDescription($project->category_id) ?></td>
                    <td><?= \Carbon\Carbon::parse($project->date)->diffForHumans() ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="/project/<?= $project->id ?>/edit">
                            <i class="fa fa-edit me-2"></i>Modifier
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>