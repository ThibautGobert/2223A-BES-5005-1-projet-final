<?php
$old = $_SESSION['old'] ?? null;

?>
<div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-4">
            <div class="card border border-primary border-5">
                <div class="card-header">
                    <h4>Inscription</h4>
                </div>
                <div class="card-body">
                    <form action="/register" method="post">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" required type="email" class="form-control" name="email" value="<?= is_null($old) ? null : $old['email'] ?>">
                        <label for="name" class="form-label">Nom</label>
                        <input id="name" required type="text" class="form-control" name="name" value="<?= is_null($old) ? null : $old['name'] ?>">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input id="firstname" required type="text" class="form-control" name="firstname" value="<?= is_null($old) ? null : $old['firstname'] ?>">
                        <label for="password" class="form-label mt-3">Mot de passe</label>
                        <input id="password" required type="password" class="form-control" name="password">
                        <label for="password_confirm" class="form-label mt-3">Confirmation de mot de passe</label>
                        <input id="password_confirm" required type="password" class="form-control" name="password_confirm">
                        <button class="btn btn-success btn-sm mt-3" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>