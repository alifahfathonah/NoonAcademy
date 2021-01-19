<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<div class="detail_view">
  <table cellpadding="0" cellspacing="0" width="100%">
  <tr class="header_caption_row">
      <td><?php echo ACTION_BUTTONS_TITLE; ?></td>
      <td><?php echo NEWS_LABEL_NEWS_TITLE; ?></td>
      <td><?php echo VIEW_LABEL_CREATE_AT; ?></td>
      <td><?php echo NEWS_LABEL_LANGUAGE_NAME; ?></td>
    </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
        <td><a href="?page_id=_admin_cpanel/news_management&DeleteID=<?php echo $row_Rs_GetNewsList['NewsID']; ?>" onclick="return confirm('Are you sure you want to Delete this record?');"><img src="images/icons/delete.gif" width="16" height="16" /></a></td>
        <td><?php echo $row_Rs_GetNewsList['NewsTitle']; ?></td>
        <td><?php echo $row_Rs_GetNewsList['CreatedAt']; ?></td>
        <td><?php echo $row_Rs_GetNewsList['LanguageName']; ?></td>
      </tr>
      <?php } while ($row_Rs_GetNewsList = mysql_fetch_assoc($Rs_GetNewsList)); ?>
  </table>

<?php if ($totalPages_Rs_GetNewsList>0) { ?>
<div>
  <table border="0">
    <tr>
      <td><?php if ($pageNum_Rs_GetNewsList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetNewsList=%d%s", $currentPage, 0, $queryString_Rs_GetNewsList); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Rs_GetNewsList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetNewsList=%d%s", $currentPage, max(0, $pageNum_Rs_GetNewsList - 1), $queryString_Rs_GetNewsList); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_Rs_GetNewsList < $totalPages_Rs_GetNewsList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetNewsList=%d%s", $currentPage, min($totalPages_Rs_GetNewsList, $pageNum_Rs_GetNewsList + 1), $queryString_Rs_GetNewsList); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_Rs_GetNewsList < $totalPages_Rs_GetNewsList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Rs_GetNewsList=%d%s", $currentPage, $totalPages_Rs_GetNewsList, $queryString_Rs_GetNewsList); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>
</div>
<?php } //end of $totalPages_Rs_GetNewsList ?>
</div>



<?php
mysql_free_result($Rs_GetNewsList);
?>