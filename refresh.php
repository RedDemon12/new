<?php include('controllerUserData.php'); ?>


                          <?php $query=mysqli_query($con,"select * from users ORDER BY RAND() LIMIT 4");
                        while($row=mysqli_fetch_array($query)) { ?>                 
<div id="refcard">
                          <table id="mytb" style="width:100%">
                          <tr>
      <td id="td1" style="width:30%"><img src="assets copy/img/avatars/user.png" alt="" class="w-px-40 h-auto rounded-circle"></td>
      <td id="td2" style="width:40%"> <?php echo htmlentities($row['username']);?></td> 
    </div>
      <td><button  type="button" class="btn btn-primary btn-sm" onclick="changeColor()" id="follow-button">Follow</button></td> <?php }?>
    </tr> 
</table>

<script>

function changeColor() {
  var button = document.getElementById("follow-button");
  button.classList.add("green");
  button.innerHTML = "Unfollow";
}
</script>
  </div>
                      </div>
                   
                