<?php 
include '../../common/view/header.lite.html.php';
include '../../common/view/chosen.html.php';
?>
<style>
    .chosen-container .chosen-results{max-height: 100px;}
</style>
<script>
$(function()
{
    $("#product, #project").chosen(defaultChosenOptions).on('chosen:showing_dropdown', function()
    {
        $(this).next('.chosen-container').removeClass('chosen-up');
    });
});
</script>
<div class='container mw-600px'>
  <form class='form-condensed' method='post' enctype='multipart/form-data' target='hiddenwin'>
  <table class='table table-form'>
      <tr>
          <th class="w-100px"><?php echo $lang->hdc->chooseProduct;?></th>
          <td colspan="" style="height: 30px;">
              <div class='input-group'>
                  <?php echo html::select('product', $products, $productID, "onchange='loadProductProjects(this.value);' class='form-control' autocomplete='off'");?>
              </div>
          </td>
      </tr>
      <tr>
          <th class="w-100px"><?php echo $lang->hdc->chooseProject;?></th>
          <td colspan="" style="height: 30px;">
              <div class='input-group'>
                  <span id='projectIdBox'><?php echo html::select('project', $projects, $projectID, "class='form-control' autocomplete='off'");?></span>
              </div>
          </td>
      </tr>
      <tr>
          <th><?php echo $lang->hdc->chooseFile;?></th>
          <td align='center'>
              <input type='file' name='file' class='form-control'/>
          </td>
      </tr>
      <tr><td align='center' colspan="2"><?php echo html::submitButton($lang->hdc->submit);?></td></tr>
  </table>
  </form>
</div>
<script>
function loadProductProjects(productID)
{
    link = createLink('hdc', 'ajaxGetProjects', 'productID=' + productID + '&branch=0');
    $('#projectIdBox').load(link, function(){$(this).find('select').chosen(defaultChosenOptions)});
}
</script>
<?php include '../../common/view/footer.lite.html.php';?>
