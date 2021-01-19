<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo ADMIN_PANEL_COURSES_LIST_HEADING;?></h2>
<div class="detail_view">
  <p>&nbsp;</p>
  <table border="1" cellpadding="3" cellspacing="3">
    <tr class="header_caption_row">
      <td>CourseID</td>
      <td><?php echo VIEW_LABEL_COURSE_NAME;?></td>
      <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
      <td><?php echo VIEW_LABEL_START_DATE;?></td>
      <td><?php echo VIEW_LABEL_END_DATE;?></td>
      <td><?php echo VIEW_LABEL_ENROLLABLE;?></td>
      <td><?php echo VIEW_LABEL_MAX_NO_OF_STUDENTS;?></td>
      <td><?php echo VIEW_LABEL_TOTAL_NO_OF_CLASSES;?><</td>
      <td><?php echo VIEW_LABEL_COURSE_FEE;?></td>
      <td><?php echo VIEW_LABEL_TEACHER; ?></td>
      <td><?php echo VIEW_LABEL_CHOOSE_TEACHER_LIBRARY; ?></td>
      <td><?php echo VIEW_LABEL_SUBJECT_TITLE; ?></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_RsCoursesList['CourseID']; ?></td>
        <td><?php echo $row_RsCoursesList['CourseName']; ?></td>
        <td><?php echo $row_RsCoursesList['Description']; ?></td>
        <td><?php echo $row_RsCoursesList['StartDate']; ?></td>
        <td><?php echo $row_RsCoursesList['EndDate']; ?></td>
        <td><?php echo $row_RsCoursesList['IsEnrollable']; ?></td>
        <td><?php echo $row_RsCoursesList['MaxNoOfStudent']; ?></td>
        <td><?php echo $row_RsCoursesList['TotalNoOfClasses']; ?></td>
        <td><?php echo $row_RsCoursesList['CourseFee']; ?></td>
        <td><?php echo $row_RsCoursesList['TeacherUserID']; ?></td>
        <td><?php echo $row_RsCoursesList['TeacherLibID']; ?></td>
        <td><?php echo $row_RsCoursesList['SubjectTitle']; ?></td>
      </tr>
      <?php } while ($row_RsCoursesList = mysql_fetch_assoc($RsCoursesList)); ?>
  </table>
</div>
<p>&nbsp;</p>
<div>

  <table border="0">
    <tr>
      <td><?php if ($pageNum_RsCoursesList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, 0, $queryString_RsCoursesList); ?>"><?php echo VIEW_LABEL_MOVE_FIRST;?></a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsCoursesList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, max(0, $pageNum_RsCoursesList - 1), $queryString_RsCoursesList); ?>"><?php echo VIEW_LABEL_MOVE_PREVIOUS;?></a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsCoursesList < $totalPages_RsCoursesList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, min($totalPages_RsCoursesList, $pageNum_RsCoursesList + 1), $queryString_RsCoursesList); ?>"><?php echo VIEW_LABEL_MOVE_NEXT;?></a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_RsCoursesList < $totalPages_RsCoursesList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, $totalPages_RsCoursesList, $queryString_RsCoursesList); ?>"><?php echo VIEW_LABEL_MOVE_LAST;?></a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>

</div>
<?php
mysql_free_result($RsCoursesList);
?>

