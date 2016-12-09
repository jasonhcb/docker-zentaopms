<?php include '../../common/view/header.html.php'; ?>
<div class='container' style="min-height: 300px">
    <div id='titlebar'>
        <div class='heading'>
            <strong><?php echo $lang->bulletin->detail; ?></strong>
        </div>
    </div>

    <div class='article-content' style="max-height: 500px;overflow: auto;">
        <div style="padding: 0 20px;">
            <div><h3><?php echo $bulletin['title']; ?></h3></div>
            <div class='desc'><?php echo $bulletin['content']; ?></div>
        </div>
    </div>
</div>
<?php include '../../common/view/footer.html.php'; ?>
