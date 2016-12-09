<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<?php include '../../../common/view/form.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>

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

    $("#centerframe").live('change', function(){
      var optid = $(this).val();
      $(this).parent().parent().find("td > #framedescription").val(optid);
    })

    $("#addfield").click(function(){
        var urls = "<?php echo $this->createLink('hdc','createcenter').'&addfield=1'; ?>";
        $.ajax({
          url: urls,
          type: "GET",
          dataType: "json",
          success: function (jdata, stat) {
           $("#next").before(jdata);
           $("#next").prev().find("td > #centerframe").trigger("chosen:updated");
           $("#next").prev().find("td > #centerframe").chosen();
        }
        });
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
            <?php echo $lang->hdc->centercreate;?>
        </div>
    </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;"> 
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->centerncode;?></th>
        <td class='w-500px'><?php echo html::input('center_code', '', "class='form-control'");?></td>
        <td class="require_td">*</td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->centername;?></th>
        <td><?php echo html::input('center_name', '', "class='form-control'");?></td><td class="require_td">*</td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->centermanager;?></th>
        <td><?php echo html::select('manager_id',$members, $hdc->centermanager,"class='form-control chosen'");?></td><td class="require_td">*</td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->hrorg;?></th>
        <td><?php echo html::select('hr_id',$depts,$hdc->hrorg, "class='form-control chosen'");?></td><td class="require_td"> *</td>
      </tr>  
      <tr >
        <th><?php echo $lang->hdc->centerframe;?></th>
        <td><?php echo html::select('centerframe[]',$centerframes,'', "class='form-control chosen'");?></td>
        <td class="require_td" style="width: 20px">*</td>
        <td><?php echo html::select('framedescription[]',$description,'', "class='form-control' placeholder='项目技术框架说明' disabled='true'");?></td>
        <td class="w-30px"><a id="addfield" class="btn btn-block"><i class="icon-plus"></i></a></td>
      </tr>
      <tr id="next">
      </tr>
      <tr>
        <th><?php echo $lang->hdc->goodfor;?></th>
        <td>
            <input type="checkbox" name="is_valid" value="1" id="goodfor" checked="checked">
        </td>
      </tr>
      <tr><td></td><td colspan='2'><?php echo html::submitButton(). html::backButton();;?></td></tr>
    </table>
  </form>

<?php include '../../../common/view/footer.html.php';?>
