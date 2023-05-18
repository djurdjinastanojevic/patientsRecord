<?php
if(isset($_COOKIE['notice']))
{
    ?>
    <div class="cookie"><?=$_COOKIE['notice']?></div>
<?php
  setcookie("notice", "", time()-3600, "/");
}
