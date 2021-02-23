<?php include('includes/header.php'); ?>
<?php include('includes/config.php'); ?>
<!-- Choice for insert -->
<?php include('insert.php'); ?>
<?php include('select.php'); ?>
    <main>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="headerBetContainer">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#players">PLAYERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#teams">TEAMS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#categ">CATEG0RY</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#games">GAMES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#matshs">M@TCHS</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Insert for new professionnal players -->
        <div class="tab-pane container active" id="players">
          <?php include('player.php'); ?>
        </div>

        <!-- Insert for new teams -->
        <div class="tab-pane container fade" id="teams">
          <?php include('team.php'); ?>
        </div>

        <!-- Insert for new games -->
        <div class="tab-pane container fade" id="games">
          <?php include('game.php'); ?>
        </div>

        <!-- Insert for new category -->
        <div class="tab-pane container fade" id="categ">
          <?php include('categ.php'); ?>
        </div>

        <!-- Insert for new matches -->
        <div class="tab-pane container fade" id="matshs">
          <?php include('match.php'); ?>
        </div>
      </div>
    </main>

<?php include('includes/footer.php'); ?>
