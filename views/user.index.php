<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between mt-3">
            <h4>Liste des utilisateurs</h4>
            <a href="/inscription" class="btn btn-primary btn-sm">
                <i class="fa fa-plus me-2"></i>
                Créer un nouvel utilisateur
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table-striped table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->firstname ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm me-3" href="/user/<?= $user->id ?>/edit">
                                <i class="fa fa-edit me-3"></i>Editer
                            </a>
                            <a class="btn btn-danger btn-sm" href="/user/<?= $user->id ?>/delete">
                                <i class="fa fa-times me-3"></i>Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>