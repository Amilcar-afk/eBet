<form class="" action="addCateg.php" method="post">
  <input class="form-control" type="text" name="name" value="" placeholder="NAME">
  <textarea class="form-control" name="description" rows="8" cols="80" placeholder="DESCRIPTION"></textarea>
  <input class="btn btn-primary" type="submit" name="" value="ADD">
</form>
<div class="scroll_section">
<table class="table table-striped table-dark">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">DESCRIPTION</th>
  </tr>
<!-- Print of category -->
<?php
  while($data = $respC->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <th scope="col"><?php echo $data['id'];?></th>
    <th scope="col"><?php echo $data['name'];?></th>
    <th scope="col"><?php echo $data['description'];?></th>
  </tr>
<?php
  }
?>
</table>

</div>
