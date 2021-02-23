<form class="" action="addMatch.php" method="post">
  <input class="form-control" type="text" name="name" value="" placeholder="NAME">
  <input class="form-control" type="date" name="date" value="">
  <input class="form-control" type="time" name="time" value="">
  <select class="form-control" name="game">
    <?php while($data = $matchG->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
    <?php } ?>
  </select>
  <select class="form-control" name="first">
    <?php while($data = $matchT->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
    <?php } ?>
  </select>
  <select class="form-control" name="second">
    <?php while($data = $matchS->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
    <?php } ?>
  </select>
  <input class="btn btn-primary" type="submit" name="" value="FIGHT">
</form>
<div class="scroll_section">
<table class="table table-striped table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">VS</th>
    <th scope="col">GAME</th>
    <th scope="col">DATE</th>
    <th scope="col">DELETE</th>
  </tr>
<!-- Print of matsh -->
<?php
  while($data = $respM->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <th scope="col"><?php echo $data['id'];?></th>
    <th scope="col"><?php echo $data['name'];?></th>
    <th scope="col"><?php echo $data['first'] . "v" . $data['second'];?></th>
    <th scope="col"><?php echo $data['game'];?></th>
    <th scope="col"><?php echo $data['dateH'];?></th>
    <th scope="col">
      <form class="" action="delete.php" method="post">
        <button class="btn btn-danger" type="submit" name="button" value="<?php echo $data['id']; ?>">X</button>
      </form>
    </th>
  </tr>
<?php
  }
?>
</table>
<script type="text/javascript" src="index.js"></script>
<p id="response"></p>

</div>
