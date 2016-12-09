<?php header("Content-type: text/html; charset=utf-8");?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../common/view/tablesorter.html.php';?>
<?php js::set('browseType', $browseType);?>
<script type="text/javascript">
    $(function()
    {
        $('#bll').click();
        $(".shows").click(function(){
            var disid = $(this).val();
            $("[name = child"+disid+"]").toggle();
            if ($(this).children().html() == "+") 
                {
                    $(this).children().html("-");
                }else{
                    $(this).children().html("+");
                }
        })
    });
</script>
<div id='querybox' class='<?php if($browseType =='bysearch') echo 'show';?>'></div>
<div class="main" style="margin-bottom: 50px;">
    <li id='bysearchTab' style="display: none;"><?php echo "<a id='bll' href='#'><i class='icon-search icon'></i>&nbsp;{$lang->hdc->byQuery}</a> "; ?></li>
    <table class='table' id=''>
        <thead>
        <tr class='colhead'>
            <th class='w-id'><?php echo $lang->distribution->id;?></th>
            <th><?php echo $lang->distribution->projectname;?></th>
            <th><?php echo $lang->distribution->name;?></th>
            <th><?php echo $lang->distribution->manager;?></th>
            <th><?php echo $lang->distribution->build;?></th>
            <th class='w-100px' ><?php echo $lang->distribution->date;?></th>
            <th class='w-100px'>详情</th>
            <th class='w-150px'><?php echo $lang->actions;?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($releases as $key => $release):?>
            <tr >
            <td class='text-center'><button class="shows" value="<?php echo $key;?>"><span class="dics"> - </span></button></td>
                <td class='text-center'><?php echo $release->productName;?></td>
                <td class='text-center'>
                    --
                </td>
                <td class='text-center'><?php echo $release->manager;?></td>
                <td class='text-center'>
                    --
                </td>
                <td class='text-center'>
                    --
                </td>
                <td class='text-center'>
                    --
                </td>
                <td class='text-center'>
                    --
                </td>
            </tr>
            <?php foreach ($release->build as $k => $val): ?>
            <tr name="child<?php echo $key;?>">
                <td class='text-center'><?php echo $k+1;?></td>
                <td class='text-center'>--</td>
                <td class='text-center'>
                <?php echo html::a($this->createlink('release','view', "release=$val->id"), $val->name);?>
                </td>
                <td class='text-center'>--</td>
                <td class='text-center'>
                <?php echo $val->buildName;?>
                </td>
                <td class='text-center'>
                <?php echo $val->date;?>
                </td>
                <td class='text-center'><?php echo common::printIcon('distribution', 'detail',   "id=$val->id", '', 'list', 'eye-open', '', 'iframe', false);?>
                </td>
                <td class='text-center'>
                <?php echo common::printIcon('distribution', 'download',   "id=$val->id", '', 'list', 'download', '', 'iframe', false);?>
                </td>
            </tr>
            <?php endforeach ?>
        <?php endforeach;?>
        </tbody>
    </table>
    <?php $pager->show();;?>
</div>
<?php include '../../common/view/footer.html.php';?>
