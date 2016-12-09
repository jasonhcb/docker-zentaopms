<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<div>
    <div id='titlebar'>
        <div class='heading'>
            <?php echo '浏览分发';?>
        </div>
    </div>
    <table class='table tablesorter' id='releaseList'>
        <thead>
        <tr class='colhead'>
            <th class='w-id'><?php echo 'ID';?></th>
            <th><?php echo '发布名称';?></th>
            <th><?php echo '申请部门';?></th>
            <th><?php echo '部门领导';?></th>
            <th><?php echo 'License数量';?></th>
            <th><?php echo 'License单价';?></th>
            <th><?php echo '客户名称';?></th>
            <th><?php echo '申请状态';?></th>
            <th><?php echo '操作';?>
        </tr>
        </thead>
        <tbody>
        <?php foreach($applyinfo as $applyinfo):?>
            <tr>
                <td class='text-center'><?php echo $applyinfo->id;?></td>
                <td class='text-center'><?php echo $applyinfo->releasename;?></td>
                <td class='text-center'><?php echo $applyinfo->deptname;?></td>
                <td class='text-center'><?php echo $applyinfo->leader;?>
                <td class='text-center'><?php echo $applyinfo->licenseqty;?></td>
                <td class='text-center'><?php echo $applyinfo->licenseprice;?></td>
                <td class='text-center'><?php echo $applyinfo->custom;?></td>
                <td class='text-center'><?php echo $applyinfo->status;?></td>
                <td class='text-center'>
                    <?php echo html::a(inlink('savedownload', "productID=$applyinfo->productID&release=$applyinfo->release"), '下载');
                          echo html::a(inlink('view', "productID=$applyinfo->productID&viewid=$applyinfo->id"), '详情');?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php include '../../common/view/footer.html.php';?>
