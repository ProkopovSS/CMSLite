<div class="tags-main">
   <?php 
     foreach ($tags as $tag) {
  ?>
  <div class="tags-link">
      <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/main/index/<?php echo $tag["id_category"];?>"><?php echo $tag["name"];?></a>
  </div>
<?php } ?>
</div>