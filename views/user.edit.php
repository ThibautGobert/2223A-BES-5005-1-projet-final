<div class="container">
    <form action="/user/<?= $user->id ?>/update" method="post">
        <div class="row">
            <div class="col-4 mt-3">
                <label for="name" class="form-label">Nom</label>
                <input id="name" name="name" type="text" class="form-control" value="<?= $user->name ?>">
            </div>
            <div class="col-4 mt-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input id="firstname" name="firstname" type="text" class="form-control" value="<?= $user->firstname ?>">
            </div>
            <div class="col-4 mt-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" value="<?= $user->email ?>">
            </div>
            <div class="col-4 mt-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" name="password" type="password" class="form-control">
            </div>
            <div class="col-4 mt-3">
                <label for="password_confirm" class="form-label">Confirmation de mot de passe</label>
                <input id="password_confirm" name="password_confirm" type="password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3 text-end">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </div>
    </form>
</div>