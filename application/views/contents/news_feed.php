<?php require_once("application/controllers/contents/".basename( __FILE__ )); ?>

  <?php do { ?>

      <h3><?php echo $row_RsGetNewsFeed['NewsTitle'] . "<em>" . $row_RsGetNewsFeed['CreatedAt'] ."</em>"; ?></h3>
     <p>
     <?php  echo $row_RsGetNewsFeed['NewsText']; ?>
	</p>
 
    <?php } while ($row_RsGetNewsFeed = mysql_fetch_assoc($RsGetNewsFeed)); ?>

<?php
mysql_free_result($RsGetNewsFeed);
?>
