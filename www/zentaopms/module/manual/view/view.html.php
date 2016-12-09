<?php
include '../../common/view/header.lite.html.php';
?>
<script type="text/javascript">
    var confirmDelete = '<?php echo $lang->manual->confirmDelete; ?>';
</script>
<div id='wrap'>
    <div class='outer'>

        <div id="searchBox"><input type="text" id="keyWord" name="keyWord" onkeypress="if (event.keyCode == 13) {searchText();}" placeholder="<?php echo $lang->manual->placeholder; ?>" />
            <input type="button" value="<?php echo $lang->manual->search; ?>" onclick="searchText();" class="searchButton">
        </div>
        <div id='titlebar'>
            <div class='heading'>  
                <strong><?php echo $manual->title; ?></strong>
            </div>
            <div class='actions'>
                <?php
                $browseLink = $this->session->manualList ? $this->session->manualList : inlink('browse');
                $params = "name=$name&confirm=yes";
                $deleteURL = $this->createLink('manual', 'delete', $params);
                $returnURL = $this->session->manualList;

                echo "<div class='btn-group'>";
                common::printIcon('manual', 'edit', $params);
                if (common::hasPriv('manual', 'delete')) {
                    echo html::a("javascript:ajaxDel(\"$deleteURL\",\"$returnURL\",confirmDelete)", '<i class="icon-remove"></i>', '', "class='btn' title='{$lang->manual->delete}'");
                }
                echo '</div>';
                //echo "<div class='btn-group'>";
                //::printRPN($browseLink, $preAndNext);
                //echo '</div>';
                ?>
            </div>
        </div>

        <div class='left-menu'>
            <div class="menu-panel panel"><div class="menu-body" id="menu"></div></div>
        </div>
        <div class='right-content'>
            <div class="content-panel panel">
                <div class="content-body" id="contentBody">
                    <div class="title"><h1><?php echo $manual->title; ?></h1></div>
                    <dl class="dl-inline">
                        <dd title="<?php echo $lang->manual->createTime; ?>"><i class="icon-time icon-large"></i> <?php echo $manual->time; ?> </dd>
                        <dd title="<?php echo $lang->manual->creater; ?>"><i class="icon-user icon-large"></i> <?php echo $manual->creater; ?></dd>
                        <dd title=""><i class="icon-edit icon-large"></i> <?php echo $lang->manual->lastEdit . '：'; ?><?php echo $manual->editer; ?> <?php echo $lang->manual->yu; ?> <?php echo $manual->edittime; ?> </dd>
                    </dl>
                        <?php echo $manual->content; ?>
                </div>
            </div>
        </div>

<?php include './footer.html.php'; ?>