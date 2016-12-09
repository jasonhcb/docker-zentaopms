<?php include '../../common/view/header.html.php'; ?>
<?php js::set('confirmDelete', $lang->bulletin->confirmDelete); ?>
<div id='titlebar'>
    <div class='heading'><?php echo html::icon($lang->icons['bulletin']); ?><?php echo $lang->bulletin->browse; ?></div>
    <div class='actions'>
        <?php common::printIcon('bulletin', 'create', '', '', 'button', '', '', 'iframe', true); ?>
    </div>
</div>

<table class='table table-condensed table-hover table-striped tablesorter table-fixed' id='bulletinList'>
    <thead>
        <tr class='colhead'>
            <th class='w-150px'><?php echo $lang->action->date; ?></th>
            <th class='w-user'><?php echo $lang->action->actor; ?></th>
            <th class="w-300px"><?php echo $lang->bulletin->title; ?></th>
            <th><?php echo $lang->bulletin->content; ?></th>
            <th class='w-100px'></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bulletins as $k => $bulletin): ?>
            <tr class='text-center'>
                <td><?php echo $bulletin['date']; ?></td>
                <td><?php echo $bulletin['actor']; ?></td>
                <td style="text-overflow:ellipsis;"><?php echo html::a(helper::createLink('bulletin', 'detail', "bulletinID=$k&onlybody=yes"), $bulletin['title'], '', "class='iframe'"); ?></td>
                <td style="text-overflow:ellipsis;"><?php echo html::a(helper::createLink('bulletin', 'detail', "bulletinID=$k&onlybody=yes"), strip_tags($bulletin['content']), '', "class='iframe'"); ?></td>
                <td class='text-center'>
                    <?php
                    if (common::hasPriv('bulletin', 'edit')) {
                        common::printIcon('bulletin', 'edit', "bulletinID=$k", '', 'list', '', '', 'iframe', true);
                    }
                    if (common::hasPriv('bulletin', 'delete')) {
                        $deleteURL = $this->createLink('bulletin', 'delete', "bulletinID=$k&confirm=yes");
                        echo html::a("javascript:bulletinDelete(\"$deleteURL\",confirmDelete)", '<i class="icon-remove"></i>', '', "title='{$lang->bulletin->delete}' class='btn-icon'");
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    function bulletinDelete(url, notice) {
        if (confirm(notice))
        {
            $.ajax(
                    {
                        type: 'GET',
                        url: url,
                        dataType: 'json',
                        success: function(data)
                        {
                            if (data.result == 'success')
                            {
                                location.reload();
                            }
                            else
                            {
                                alert(data.message);
                            }
                        }
                    });
        }
    }
</script>
<?php include '../../common/view/footer.html.php'; ?>
