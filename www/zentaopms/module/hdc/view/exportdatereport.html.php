<?php include '../../common/view/header.lite.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<style>
    .chosen-container .chosen-results{max-height: 100px;}
</style>
<script>
$(function()
{
    $("#projects").chosen(defaultChosenOptions).on('chosen:showing_dropdown', function()
    {
        $(this).next('.chosen-container').removeClass('chosen-up');
    });
});

function setDownloading()
{
    if($.browser.opera) return true;   // Opera don't support, omit it.

    $.cookie('downloading', 0);
    time = setInterval("closeWindow()", 300);
    return true;
}

function closeWindow()
{
    if($.cookie('downloading') == 1)
    {
        parent.$.closeModal();
        $.cookie('downloading', null);
        clearInterval(time);
    }
}

</script>

<form class='form-condensed pdb-20' method='post' target='hiddenwin' style="padding: 20px 1% 50px">
	<table align='center' class='table table-form'> 
		<tr>
          <th class='w-100px'><?php echo $lang->hdc->chooseProject;?> <input type='checkbox' name='allProjects' value='1'></th>
          <td class='f-14px pv-10px'>
			<div class='input-group'>
				<?php 
				echo html::select('projects[]', $projects, $projectID, "multiple");
				?>
			</div>
          </td>
        </tr>
        <tr><td class='text-center' colspan='2' height='130'></td></tr>
		<tr>
            <th class='w-100px' style="text-align: left;">希望完成日期:</th>
                <div class='input-group'>
                    <td class='f-14px pv-10px'>
                    <label class="radio-inline">
                        <input type="radio" name="icd" value="1">大于等于
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="icd" value="2">小于等于
                    </label>
                    <label style="margin-left: 30px;">
                    <?php echo html::input('finishtime','', "class='form-control form-date'");?>
                    </label>
                    </td>
                </div>
        </tr>
        <tr>
            <th class='w-100px' style="text-align: left;"></th>
                <div class='input-group'>
                    <td class='f-14px pv-10px'>
                    <label class="radio-inline">
                        <input type="radio" name="icd" value="3">时间范围
                    </label>
                    <label style="margin-left: 30px;">
                    <?php echo html::input('begintime','', "class='form-control form-date'");?>
                    </label>
                   <label style="margin-left: 30px;">到</label>
                    <label style="margin-left: 30px;">
                    <?php echo html::input('endtime','', "class='form-control form-date'");?>
                    </label>
                    </td>
                </div>
        </tr>
		<tr>
		<td class='text-center' colspan='2'>
		<?php echo html::submitButton($lang->export, "onclick='setDownloading();' ");?>
		</td>
		</tr>
	</table>
</form>
<?php include '../../common/view/footer.lite.html.php';?>
