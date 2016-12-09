<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<script>
$(function()
{
});
</script>
<style type="text/css">
    .require_td{
        color: #d2322d !important; 
        font-family: arial !important;
        font-size: 20px !important;
        content: "*" !important;
    }
</style>
<div>
    <div id='titlebar'>
        <div class='heading'>
            <?php echo $lang->hdc->createuser;?>
        </div>
    </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;"> 
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->usernumber."/".$lang->hdc->name;?></th>
        <td class='w-400px'><?php echo html::select('account',$members,'',"class='form-control chosen'");?></td>
        <td class="require_td">*</td>
        <th class='w-120px'><?php echo $lang->hdc->department;?></th>
        <td class='w-400px' style="float: left;"><?php echo html::select('dep_id',$depts, '', "class='form-control chosen'");?></td>
        <td class="require_td" style="float: left;">*</td>
      </tr>  
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->directmanager;?></th>
        <td class='w-400px' ><?php echo html::select('manager_id', $members,'',"class='form-control chosen'");?></td>
        <td class="require_td" style="float: left;">*</td>
      </tr>   
      <tr><td></td><td colspan='2'><?php echo html::submitButton(). html::backButton();;?></td></tr>
    </table>
  </form>

<?php include '../../../common/view/footer.html.php';?>
