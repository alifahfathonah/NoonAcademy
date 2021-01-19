<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_COURSE_ENROLL_STUDENT_HEADING; ?></h2>
<div class="data_entry_view">
<form action="<?php echo $editFormAction; ?>" method="POST" name="frmAddToCourse" accept-charset="utf-8"><div>
<fieldset>

<div class="detail_view">
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr class="header_caption_row">
      <td>UserID</td>
      <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></td>
      <td><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_EMAIL_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_CONTACT_NO_LABEL;?></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><input name="UserID[]" type="checkbox" value="<?php echo $row_RsGetStudentDetails['UserID']; ?>"></td>
        <td><?php echo $row_RsGetStudentDetails['Username']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['FirstName']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['MiddleNames']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['LastNames']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['AddressLine1']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['City']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['Phone']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['Email']; ?></td>
        <td><?php echo $row_RsGetStudentDetails['ContactNo']; ?></td>
      </tr>
      <?php } while ($row_RsGetStudentDetails = mysql_fetch_assoc($RsGetStudentDetails)); ?>
  </table>
<p>&nbsp;</p>
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
 
 <input type="hidden" name="CourseID" value="<?php if(isset($_POST['CourseID'])) echo $_POST['CourseID']; else echo "0"; ?>">
  <input type="hidden" name="MM_insert" value="frmAddThisStudentToCourse">
  <input name="BtnSave" type="submit" value="Save">
  </div>
  </fieldset>
</form>
  </div>
<?php
@mysql_free_result($RsGetStudentDetails);

@mysql_free_result($RsGetStudentDetails);
?>
