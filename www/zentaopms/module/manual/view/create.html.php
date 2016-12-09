<?php include './header.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<script>
  var msg='<?php echo $lang->manual->msg;?>'; 
  $('#submit').click(function(){
  var title=$('#title').val(); 
      if(title ==''|| title.match(/^\s+$/g)){
        alert(msg);return false;
      }
      return true;
  });

</script>
<div class='container mw-1400px'>
  <div id='titlebar'>
    <div class='heading'>
      <strong><small class='text-muted'><i class='icon icon-plus'></i></small> <?php echo $lang->manual->create;?></strong>
    </div>
  </div>
  <form class='form-condensed' method='post' id='dataform'>
    <table class='table table-form'>  
      <tr>
        <th class='w-80px'><?php echo $lang->manual->name;?></th>
        <td colspan='2'><?php echo html::input('title', '', "class='form-control'");?></td>
      </tr> 
      <tr>
        <th><?php echo $lang->manual->content;?></th>
        <td colspan='2'><?php echo html::textarea('content', '', "class='form-control' style='width:90%; height:400px'");?></td>
      </tr>  
      <tr>
        <td></td>
        <td><?php echo html::submitButton() . html::backButton();?></td>
      </tr>
    </table>
  </form>
</div>
<?php include './footer.html.php';?>