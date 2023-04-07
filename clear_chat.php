<?php
include('controllerUserData.php');

$user_id = $_GET['user_id'];


?>


  <form method="post" action="clear-chat-user.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <p>Are you sure you want to delete your Chat?</p>
    <input type="submit" name="no" value="No" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">

    <input type="submit" name="yes" value="Yes" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
  </form>


