<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='container'>
  <div id='titlebar'>
    <div class='heading'>
      <strong><?php echo $lang->bulletin->edit;?></strong>
    </div>
  </div>
  <form class='form-condensed pdb-20' method='post' target='hiddenwin' id='dataform'>
    <table align='center' class='table table-form'>
	  <tr>
        <th class='w-80px'><?php echo $lang->bulletin->title;?></th>
        <td><?php echo html::input('title', $bulletin['title'], "class=form-control");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->bulletin->content;?></th>
        <td><?php echo html::textarea('content', $bulletin['content'], "rows='10' class='form-control'");?></td>
      </tr>  
      <tr><th></th><td><?php echo html::submitButton();?></td></tr>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
