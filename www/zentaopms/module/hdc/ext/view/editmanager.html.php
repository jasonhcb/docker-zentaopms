<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<script>
$(function()
{
    $("#goodfor").click(function(){
        var statu = $("#goodfor").val();
        if (statu == '1') {
            $("#goodfor").val(0);
        }else{
            $("#goodfor").val(1);
        }
    })
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
            <?php echo $lang->hdc->editmanager;?>
        </div>
    </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;"> 
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->usernumber."/".$lang->hdc->name;?></th>
        <td class='w-500px'><?php echo html::select('account', $members,$data->account, "class='form-control chosen' disabled='true'");?></td>
        <td class="require_td">*</td>
      </tr>   
      <tr>
        <th ><?php echo $lang->hdc->routefile;?></th>
        <td><?php echo html::select('route',$routetype,$data->route, "class='form-control chosen'");?></td><td class="require_td">*</td>
      </tr>   
      <tr>
        <th><?php echo $lang->hdc->goodfor;?></th>
        <td><input type="checkbox"  name="is_valid" id="goodfor"
                        <?php if ($data->is_valid == '1') {
                            echo "checked='checked'";
                        } ?> value="<?php echo $data->is_valid; ?>"></td>
      </tr>
      <tr><td></td><td colspan='2'><?php echo html::submitButton(). html::backButton();;?></td></tr>
    </table>
  </form>

<?php include '../../../common/view/footer.html.php';?>
