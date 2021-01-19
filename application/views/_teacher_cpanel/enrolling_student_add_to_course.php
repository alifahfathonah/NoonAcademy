<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_COURSE_GET_ENROLL_STUDENT_HEADING; ?></h2>
<div class="detail_view">

<form action="<?php echo $editFormAction; ?>" method="POST" name="frmAddToCourse" accept-charset="utf-8"> 
<fieldset>

  <table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr class="header_caption_row">
      <td><?php echo VIEW_LABEL_CHOOSE;?></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></strong></td>
      </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
        <td><input name="UserID[]" type="checkbox" value="<?php echo $row_RsGetStudentDetails['UserID']; ?>"></td>
        <td><?php echo $row_RsGetStudentDetails['Username']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['FirstName']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['MiddleNames']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['LastNames']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['AddressLine1']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['City']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['Phone']; ?></td>
        </tr>
      <?php } while ($row_RsGetStudentDetails = mysql_fetch_assoc($RsGetStudentDetails)); ?>
  </table>
<p>&nbsp;</p>

 
 <input type="hidden" name="CourseID" value="<?php if(isset($_POST['CourseID'])) echo $_POST['CourseID']; else echo "0"; ?>">
  <input type="hidden" name="MM_insert" value="frmAddThisStudentToCourse">
  <input name="BtnSave" type="submit" value="<?php echo SUBMIT_BUTTON_SAVE;?>">
  
  </fieldset>
</form>
  </div>
  
  
  <div> <!-- Start of Navigation Panel -->
  <table border="0">
    <tr>
      <td><?php if ($pageNum_RsGetStudentDetails > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsGetStudentDetails=%d%s", $currentPage, 0, $queryString_RsGetStudentDetails); ?>"><?php echo VIEW_LABEL_MOVE_FIRST;?></a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsGetStudentDetails > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsGetStudentDetails=%d%s", $currentPage, max(0, $pageNum_RsGetStudentDetails - 1), $queryString_RsGetStudentDetails); ?>"><?php echo VIEW_LABEL_MOVE_PREVIOUS;?></a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsGetStudentDetails < $totalPages_RsGetStudentDetails) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsGetStudentDetails=%d%s", $currentPage, min($totalPages_RsGetStudentDetails, $pageNum_RsGetStudentDetails + 1), $queryString_RsGetStudentDetails); ?>"><?php echo VIEW_LABEL_MOVE_NEXT;?></a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_RsGetStudentDetails < $totalPages_RsGetStudentDetails) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsGetStudentDetails=%d%s", $currentPage, $totalPages_RsGetStudentDetails, $queryString_RsGetStudentDetails); ?>"><?php echo VIEW_LABEL_MOVE_LAST;?></a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
</div><!-- End of Navigation Panel -->
<?php
@mysql_free_result($RsGetStudentDetails);

@mysql_free_result($RsGetStudentDetails);
?>
