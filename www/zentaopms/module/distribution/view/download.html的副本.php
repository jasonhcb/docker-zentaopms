<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<div>
    <div id='titlebar'>
        <div class='heading'>
            <?php echo '下载历史';?>
        </div>
    </div>
    <table class='table tablesorter' id='releaseList'>
        <thead>
        <tr class='colhead'>
            <th class='w-id'><?php echo 'ID';?></th>
            <th class='w-100px'><?php echo '对应分发';?></th>
            <th class='w-100px'><?php echo '下载人员'?></th>
            <th class='w-150px'><?php echo '下载时间';?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($downloads as $downloads):?>
            <tr>
                <td class='text-center'><?php echo $downloads->id;?></td>
                <td class='text-center'><?php echo $downloads->release;?></td>
                <td class='text-center'><?php echo $downloads->staff;?></td>
                <td class='text-center'><?php echo $downloads->time;?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php include '../../common/view/footer.html.php';?>
