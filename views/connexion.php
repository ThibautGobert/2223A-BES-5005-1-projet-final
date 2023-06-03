<div class="container h-100">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-4">
            <div class="card border border-primary border-5">
                <div class="card-header">
                    <h4>Connexion</h4>
                </div>
                <div class="card-body">
                    <form action="/connexion" method="post">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                        <label for="password" class="form-label mt-3">Password</label>
                        <input id="password" type="password" class="form-control" name="password">
                        <button class="btn btn-success btn-sm mt-3" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>