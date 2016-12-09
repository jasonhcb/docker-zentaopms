<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/tablesorter.html.php';?>
<?php include '../../../common/view/form.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>

<script>
$(function()
{
    <?php if ($data->applystatus == 'C') :?> 
    $("input").attr("disabled",true);
    <?php endif; ?>
    $("#ascenter_id").change(function(){
      var data = $(this).children('option:selected').val(); 
      var urls = "<?php echo $this->createLink('hdc','allcationedit').'&frames='; ?>"+data;
      $.ajax({     
        url: urls,
        type: "GET",
        dataType: "json",
        success: function (jdata, stat) {
          // $("select[name=frame_id]").attr("disabled",false);
          // var fra = "";
          // $.each(jdata['frame'],function(index,value){
          // fra += "<option value='"+value.id+"'>"+value.name+"</option>";
          //           })
          // $("#frame_id").html(fra);

          var tech = "";
          $.each(jdata['deptuser'],function(index,value){
            tech += "<option value='"+value.account+"'>"+value.username+"</option>";
            })
            $("#tech_manager").html(tech);
            $("#tech_manager").trigger("chosen:updated");
            $("#tech_manager").chosen();
            // $("#frame_id").trigger("chosen:updated");
            // $("#frame_id").chosen();
        }
    });
    })

    $("#astestcenter_id").change(function(){
      var data = $(this).children('option:selected').val(); 
      var urls = "<?php echo $this->createLink('hdc','allcationedit').'&frames='; ?>"+data;
      $.ajax({     
        url: urls,
        type: "GET",
        dataType: "json",
        success: function (jdata, stat) {
          var tech = "";
          $.each(jdata['deptuser'],function(index,value){
            tech += "<option value='"+value.account+"'>"+value.username+"</option>";
            })
            $("#test_manager").html(tech);
            $("#test_manager").trigger("chosen:updated");
            $("#test_manager").chosen();
        }
    });

    })

    $("#submit").click(function(){
      $("select[name=project_id]").attr("disabled",false);
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
            <?php echo $lang->hdc->editcation;?>
        </div>
    </div>
</div>
<form class='form-condensed' method='post' target='hiddenwin' id='dataform'>
    <table class='table table-form' style="border: none;">
      <tr>
        <th class='w-120px'><?php echo $lang->hdc->project;?></th>
        <td class='w-400px'><?php echo html::select('project_id', $projects,$data->project_id, "class='form-control ' disabled='ture'");?></td>
        <td class="require_td">*</td>
        <th class='w-120px'><?php echo $lang->hdc->projectframe;?></th>
        <td class='w-400px'>
        <?php echo html::select('frame_id', $frame,$data->frame_id, "class='form-control chosen'");?>
        </td>
        <td class="require_td"></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->projectmanager;?></th>
        <td><?php echo html::input('manager_id', $data->manager_name, "class='form-control' readonly='readonly'");?></td>
        <td class="require_td"></td>
        <th class='w-120px'><?php echo $lang->hdc->uatdate;?></th>
        <td class='w-400px'><?php echo html::input('uat_date', $data->uat_date, "class='form-control form-date'");?></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->onlinedate;?></th>
        <td><?php echo html::input('online_date',$data->online_date,"class='form-control form-date'");?></td><td class="require_td"></td>
        <th ><?php echo $lang->hdc->cto;?></th>
        <?php if ($data->applystatus == 'C') :?> 
        <td><?php echo html::select('cto_id',$user,$data->cto_id,"class='form-control' disabled='ture' ");?></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->spotcto;?></th>
        <td><?php echo html::select('spotcto_id',$user,$data->spotcto_id, "class='form-control' disabled='ture'");?></td><td class="require_td"></td>
      <?php else:?>
      <td><?php echo html::select('cto_id',$user,$data->cto_id,"class='form-control chosen'");?></td>
      </tr>  
      <tr>
        <th ><?php echo $lang->hdc->spotcto;?></th>
        <td><?php echo html::select('spotcto_id',$user,$data->spotcto_id, "class='form-control chosen'");?></td><td class="require_td"></td>
      <?php endif;?>
        <th ><?php echo $lang->hdc->fpd;?></th>
        <td><?php echo html::input('fpd',$data->fpd, "class='form-control'");?></td>
      </tr>  
      <tr >
        <th><?php echo $lang->hdc->applystatus;?></th>
        <td><?php echo html::input('applystatus',$lang->hdc->statustype[$data->applystatus], "class='form-control' disabled='ture'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->applydescription;?></th>
        <td><?php echo html::input('description',$data->description, "class='form-control'");?></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->applydate;?></th>
        <td><?php echo html::input('applydate',$data->applydate, "class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->applyuser;?></th>
        <td><?php echo html::select('applyuser',$user,$data->create_user, "class='form-control' disabled='ture' ");?></td>
      </tr>
      <?php if ($data->applystatus != 'S') :?>
      <tr>
        <th><?php echo $lang->hdc->assigntodevelop;?></th>
          <td><?php echo html::input('assigntodevelop',$data->assigntodevelop, "class='form-control' readonly='readonly'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assigndate;?></th>
        <td><?php echo html::input('assigndate',$data->assigndate, "class='form-control' readonly='readonly'");?></td>
      </tr>
      <?php else: ?>
      <tr>
        <th><?php echo $lang->hdc->assigntodevelop;?></th>
          <td><?php echo html::input('assigntodevelop',$data->assigntodevelop, "class='form-control' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assigndate;?></th>
        <td><?php echo html::input('assigndate',$data->assigndate, "class='form-control'");?></td>
      </tr>
      <?php endif;?>
      <?php if ($data->applystatus != 'Y') :?>
      <tr>
        <th><?php echo $lang->hdc->assigntocenter;?></th>
        <td><?php echo html::select('ascenter_id',$center,$data->ascenter_id, "class='form-control' disabled='ture' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtechmanager;?></th>
        <td>
        <?php echo html::select('tech_manager',$deptuser,$data->tech_manager, "class='form-control' disabled='ture' ");?>
        </td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->assigntotestcenter;?></th>
        <td><?php echo html::select('astestcenter_id',$center,$data->astestcenter_id, "class='form-control' disabled='ture' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtestmanager;?></th>
        <td><?php echo html::select('test_manager',$depttestuser,$data->test_manager, "class='form-control' disabled='ture' ");?></td>
      </tr>      
      <tr >
        <th><?php echo $lang->hdc->assignstatus;?></th>
        <td><?php echo html::input('assignstatus',$lang->hdc->assigntype[$data->assignstatus],"class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assignnote;?></th>
        <td><?php echo html::input('assignnote',$data->assignnote, "class='form-control' readonly='readonly'");?></td>
        <td class="require_td"></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->listcomfim;?></th>
        <?php if ($data->applystatus == 'S') : ?>
        <td><?php echo html::select('listcomfim',$user,$listcomfim,"class='form-control' disabled='ture' ");?></td>
        <?php else: ?>
        <td><?php echo html::input('listcomfim','',"class='form-control' disabled='ture' ");?></td>
        <?php endif;?>
        <td class="require_td"></td>
      </tr>     
      <?php else: ?>
        <tr>
        <th><?php echo $lang->hdc->assigntocenter;?></th>
        <td><?php echo html::select('ascenter_id',$center,$data->ascenter_id, "class='form-control chosen'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtechmanager;?></th>
        <td>
        <?php echo html::select('tech_manager',$deptuser,$data->tech_manager, "class='form-control chosen'");?>
        </td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->assigntotestcenter;?></th>
        <td><?php echo html::select('astestcenter_id',$center,$data->astestcenter_id, "class='form-control chosen'");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->devtestmanager;?></th>
        <td><?php echo html::select('test_manager',$depttestuser,$data->test_manager, "class='form-control chosen'");?></td>
      </tr>      
      <tr >
        <th><?php echo $lang->hdc->assignstatus;?></th>
        <td><?php echo html::input('assignstatus',$lang->hdc->assigntype[$data->assignstatus],"class='form-control' readonly='readonly' ");?></td>
        <td class="require_td"></td>
        <th><?php echo $lang->hdc->assignnote;?></th>
        <td><?php echo html::input('assignnote',$data->assignnote, "class='form-control' ");?></td>
        <td class="require_td"></td>
      </tr>
      <tr >
        <th><?php echo $lang->hdc->listcomfim;?></th>
        <td><?php echo html::input('listcomfim',$data->listcomfim,"class='form-control' disabled='ture' ");?></td>
        <td class="require_td"></td>
      </tr>     
      <?php endif; ?>
      <tr><td></td><td colspan='2'>
      <?php if ($data->applystatus == 'S') { ?>
      <?php echo html::submitButton($lang->hdc->submitconfim);?>
      <?php } ?>
      <?php if ($data->applystatus == 'N') { ?>
      <?php echo html::submitButton($lang->hdc->submiton);?>
      <?php 
      $link = $this->createLink('hdc','allcationcancel',"allcationid=$data->id");
      echo html::linkButton($lang->hdc->cancel, $link,'self','','btn btn-warning');
      ?>
      <?php } ?>
      <?php if ($data->applystatus == 'Y' && $data->assignstatus != 'Y') { ?>
      <?php echo html::submitButton($lang->hdc->submitassign);
      ?>
      <?php } ?>
      <?php if ($data->applystatus == 'Y' && $data->assignstatus == 'Y') { ?>
      <?php echo html::submitButton($lang->hdc->resubmitassign);
      ?>
      <?php } ?>
      </td></tr>
    </table>
  </form>

<?php include '../../../common/view/footer.html.php';?>
