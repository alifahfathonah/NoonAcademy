<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2> News Management </h2>


<div class="data_column_a">
<div class="data_entry_view">
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td><?php echo NEWS_LABEL_NEWS_TITLE; ?></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="NewsTitle" value="" size="32"></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo NEWS_LABEL_NEWS_TEXT; ?></td>
      </tr>
      <tr valign="baseline">
        <td><textarea name="NewsText" cols="50" rows="5"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo NEWS_LABEL_LANGUAGE_NAME; ?></td>
      <tr valign="baseline">
        <td><select name="Content_LanguageID">
          <?php 
do {  
?>
          <option value="<?php echo $row_Rs_GetContentLanguages['ContentLanguageID']?>" ><?php echo $row_Rs_GetContentLanguages['LanguageName']?></option>
          <?php
} while ($row_Rs_GetContentLanguages = mysql_fetch_assoc($Rs_GetContentLanguages));
?>
        </select></td>
      <tr valign="baseline">
        <td><input type="submit" value="<?php echo SUBMIT_BUTTON_SAVE; ?>"></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1">
  </form>
  <p>&nbsp;</p>
</div>
</div>


<div class="data_column_b">
<?php require_once("application/views/_admin_cpanel/news_get_list.php"); ?>
</div>


<?php
mysql_free_result($Rs_GetContentLanguages);
?>
