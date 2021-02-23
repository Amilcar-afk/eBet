<form class="" action="addTeam.php" method="post">
  <input class="form-control" type="text" name="name" value="" placeholder="NAME">
  <select class="form-control" name="type">
    <option value="1">Solo</option>
    <option value="2">Duo</option>
    <option value="3">Trio</option>
    <option value="4">Quatuor</option>
    <option value="5">Quintet</option>
  </select>
  <input class="form-control" type="text" name="orga" value="" placeholder="ORGANIZATION">
  <input class="form-control" type="date" name="date" value="" placeholder="DATE OF CREATION">
  <input class="btn btn-primary" type="submit" name="" value="SEND">
</form>

<div class="scroll_section">

<table class="table table-striped table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">TYPE</th>
    <th scope="col">ORGANIZATION</th>
    <th scope="col">CREATION</th>
  </tr>
  <!-- Print of teams -->
  <?php
    while($data = $respT->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <th scope="col"><?php echo $data['id'];?></th>
      <th scope="col"><?php echo $data['name'];?></th>
      <th scope="col"><?php echo $data['type'] . "v" . $data['type'];?></th>
      <th scope="col"><?php echo $data['organization'];?></th>
      <th scope="col"><?php echo $data['creation'];?></th>
    </tr>
  <?php
    }
  ?>
</table>

</div>
