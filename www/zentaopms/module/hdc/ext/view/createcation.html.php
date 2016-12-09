<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<?php include '../../../common/view/form.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>

<script>
$(function()
{
    $("#project_id").change(function(){
      var data = $(this).children('option:selected').val(); 
      var urls = "<?php echo $this->createLink('hdc','createcation').'&project='; ?>"+data;
      $.ajax({     
        url: urls,
        type: "GET",
        dataType: "json",
        success: function (jdata, stat) {
          if (jdata['manager'].account != '') {
            $("#manager_id").val(jdata['manager'].account+':'+jdata['manager'].realname);
          }
           // $("#assigntodevelop").val(jdata['assinpro'].totalcount);
           // $("#assigndate").val(jdata['assinpro'].sumary);
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
            <?php echo $lang->hdc->createcation;?>
        </div>
    </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;"> 
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->project;?></th>
        <td class='w-400px'><?php echo html::select('project_id', $projects,'', "class='form-control chosen'");?></td>
        <td class="require_td">*</td>
        <th class='w-120px'><?php echo $lang->hdc->projectframe;?></th>
        <td class='w-400px'><?php echo html::select('frame_id',$framework,'', "class='form-control chosen'");?></td>
        <td class="require_td"></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->projectmanager;?></th>
        <td><?php echo html::input('manager_id', '', "class='form-control' readonly='readonly'");?></td>
        <td class="require_td"></td>
        <th class='w-120px'><?php echo $lang->hdc->uatdate;?></th>
        <td class='w-400px'><?php echo html::input('uat_date', '', "class='form-control form-date'");?></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->onlinedate;?></th>
        <td><?php echo html::input('online_date','',"class='form-control form-date'");?></td><td class="require_td"></td>
        <th ><?php echo $lang->hdc->cto;?></th>
        <td><?php echo html::select('cto_id',$user,'',"class='form-control chosen'");?></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->spotcto;?></th>
        <td><?php echo html::select('spotcto_id',$user,'', "class='form-control chosen'");?></td><td class="require_td"></td>
        <th ><?php echo $lang->hdc->fpd;?></th>
        <td><?php echo html::input('fpd','', "class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->hdc->applystatus;?></th>
        <td><?php echo html::input('applystatus',$statustype['N'], "class='form-control' disabled='ture'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->applydescription;?></th>
        <td><?php echo html::input('description','', "class='form-control'");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->applydate;?></th>
        <td><?php echo html::input('applydate',$nowtime, "class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->applyuser;?></th>
        <td><?php echo html::select('applyuser',$user,$nowuser, "class='form-control' disabled='ture' ");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->assigntodevelop;?></th>
        <td><?php echo html::input('assigntodevelop','', "class='form-control' readonly='readonly'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assigndate;?></th>
        <td><?php echo html::input('assigndate','', "class='form-control' readonly='readonly'");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->assigntocenter;?></th>
        <td><?php echo html::input('ascenter_id','', "class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtechmanager;?></th>
        <td><?php echo html::input('tech_manager','', "class='form-control' readonly='readonly'");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->assigntotestcenter;?></th>
        <td><?php echo html::input('astestcenter_id','', "class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtestmanager;?></th>
        <td><?php echo html::input('test_manager','', "class='form-control' readonly='readonly'");?></td>
      </tr>      
      <tr >
        <th><?php echo $lang->hdc->assignstatus;?></th>
        <td><?php echo html::input('assignstatus',$assigntype['N'],"class='form-control' disabled='ture' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assignnote;?></th>
        <td><?php echo html::input('assignnote','', "class='form-control' disabled='ture' ");?></td>
      </tr>  
       <tr >
        <th><?php echo $lang->hdc->listcomfim;?></th>
        <td><?php echo html::input('listcomfim','',"class='form-control' disabled='ture' ");?></td>
        <td class="require_td"></td>
      </tr>     
      <tr><td></td><td colspan='2'><?php echo html::submitButton() . html::backButton();;?></td></tr>
    </table>
  </form>

<?php include '../../../common/view/footer.html.php';?>
