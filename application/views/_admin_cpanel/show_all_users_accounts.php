<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>

<h2><?php echo ADMIN_PANEL_USERS_LIST_HEADING;?></h2>
<div class="detail_view">
  <table cellpadding="0" cellspacing="0">
    <tr class="header_caption_row">
      <td><?php echo ACTION_BUTTONS_TITLE; ?></td>
      <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></td>
      <td><?php echo ADMIN_PANEL_USER_GROUP; ?></td>
      <td><?php echo VIEW_LABEL_CREATE_AT; ?></td>
    </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
        <td><?php echo $row_Rs_GetAllUserAccounts['UserID']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['Username']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['FirstName']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['MiddleNames']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['LastNames']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['AddressLine1']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['City']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['GroupID']; ?></td>
        <td><?php echo $row_Rs_GetAllUserAccounts['CreatedAt']; ?></td>
      </tr>
      <?php } while ($row_Rs_GetAllUserAccounts = mysql_fetch_assoc($Rs_GetAllUserAccounts)); ?>
  </table>

<?php if($totalPages_Rs_GetAllUserAccounts>0) { ?>
  <p>&nbsp; </p> 
  <table border="0">
    <tr>
      <td><?php if ($pageNum_Rs_GetAllUserAccounts > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetAllUserAccounts=%d%s", $currentPage, 0, $queryString_Rs_GetAllUserAccounts); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Rs_GetAllUserAccounts > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetAllUserAccounts=%d%s", $currentPage, max(0, $pageNum_Rs_GetAllUserAccounts - 1), $queryString_Rs_GetAllUserAccounts); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Rs_GetAllUserAccounts < $totalPages_Rs_GetAllUserAccounts) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetAllUserAccounts=%d%s", $currentPage, min($totalPages_Rs_GetAllUserAccounts, $pageNum_Rs_GetAllUserAccounts + 1), $queryString_Rs_GetAllUserAccounts); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_Rs_GetAllUserAccounts < $totalPages_Rs_GetAllUserAccounts) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetAllUserAccounts=%d%s", $currentPage, $totalPages_Rs_GetAllUserAccounts, $queryString_Rs_GetAllUserAccounts); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
<?php } ?>
</div>

<?php
mysql_free_result($Rs_GetAllUserAccounts);
?>
