<?php
include("includes/header.php");
$users = new user;
$main = new main();
   $username =$users->username; 
   $userid = $users->userid;
   $per = $users->per;
?>
<div class="container" style="text-align: center;" >
<h2>
<?php if($per == 100): ?>
    welcome admin <?= $username ?>
 <?php else: ?> 
 welcome <?= $username ?>
 <?php endif ?>
</h2>
</div>

</body>
</html>