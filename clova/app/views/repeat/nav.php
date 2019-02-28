<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>">Clover 2.0</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Cerrar Sesión</a>
      </li>
      <?php else : ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Registrarse</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Iniciar sesión</a>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</div>
</nav>