<form class="form-signin" action="controllers/belepes.php" method="post">
      <img class="img-fluid" src="https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_FMjpg_UX1000_.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Kérem szépen lépjen be</h1>
      <label for="inputEmail" class="sr-only">Email cím</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email cím" required autofocus>
      <label for="inputPassword" class="sr-only">Jelszó</label>
      <input type="password" name="jelszo" id="inputPassword" class="form-control" placeholder="Jelszó" required>
      <div class="checkbox mb-3">
        <label>
          <input name="emlekezzram" type="checkbox" value="remember-me"> Emlékezz rám
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Bejelentkezés</button>
     
</form>