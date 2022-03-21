<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="?oldal=fooldal">Főoldal <span class="sr-only">(current)</span></a>

      <?php if(!isset($_SESSION['felhasznalo'])):?>

        <a class="nav-link" href="?oldal=regisztracio">Regisztracio</a>
        <a class="nav-link" href="?oldal=belepes">Belepes</a>
      
      <?php else: ?>

        <a class="nav-link" href="?kilepes">Kilépés</a>
        
      <?php endif; ?>
        
      <a class="nav-link disabled">Disabled</a>
    </div>
  </div>
</nav>