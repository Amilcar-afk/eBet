<form class="" action="addPlayer.php" method="post">
  <input class="form-control" type="text" name="firstname" value="" placeholder="FIRSTNAME">
  <input class="form-control" type="text" name="lastname" value="" placeholder="LASTNAME">
  <input class="form-control" type="text" name="pseudo" value="" placeholder="PSEUDO">
  <select class="form-control" name="team">
    <?php while($data = $playerT->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
    <?php } ?>
  </select>
  <select class="form-control" name="country">
    <?php while($data = $playerC->fetch(PDO::FETCH_ASSOC)) { ?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['nom_en_gb']; ?></option>
    <?php } ?>
  </select>
  <input class="btn btn-primary" type="submit" name="" value="ADD">
</form>

<div  class="scroll_section">


<table class="table table-striped table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">FIRSTNAME</th>
    <th scope="col">LASTNAME</th>
    <th scope="col">PSEUDO</th>
    <th scope="col">TEAM</th>
    <th scope="col">COUNTRY</th>
  </tr>
  <!-- Print of players -->
  <?php
    while($data = $respP->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <th scope="col"><?php echo $data['id'];?></th>
      <th scope="col"><?php echo $data['firstname'];?></th>
      <th scope="col"><?php echo $data['lastname'];?></th>
      <th scope="col"><?php echo $data['pseudo'];?></th>
      <th scope="col"><?php echo $data['team'];?></th>
      <th scope="col"><?php echo $data['country'];?></th>
    </tr>
  <?php
    }
  ?>
</table>
  </div>
