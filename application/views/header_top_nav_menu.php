                      <a href="index.php" class="<?php 
					  if(!isset($_GET['page_id']))  echo "active ";?> right_border">
                      <?php if(!isset($_GET['page_id'])){ ?>
                      <img src="images/header_top_nav/icon_selected.png" width="22" height="19" />
                      <?php }else { ?>
                      <img src="images/header_top_nav/icon_norrmal.png" width="22" height="19" /> <?php } ?></a>
                      <a href="?page_id=avaliable_courses" class="<?php if(isset($_GET['page_id']) && $_GET['page_id']=="avaliable_courses")  echo "active ";?> right_border"><?php echo  HEADER_NAV_COURSES;  ?></a>                      
                      <a href="?page_id=our_company" class="<?php if(isset($_GET['page_id']) && $_GET['page_id']=="our_company")  echo "active ";?>  right_border"><?php echo  HEADER_NAV_ABOUT_US;  ?></a>
                      <a href="?page_id=our_services" class="<?php if(isset($_GET['page_id']) && $_GET['page_id']=="our_services")  echo "active ";?> right_border"><?php echo  HEADER_NAV_SERVICES;  ?></a>
                      <a href="?page_id=support" class="<?php if(isset($_GET['page_id']) && $_GET['page_id']=="support")  echo "active ";?>"><?php echo  HEADER_NAV_SUPPORT;  ?></a>  