function getBlocks(moduleID)
{
    var moduleBlock = $('#modules').parent().parent().next();
    $(moduleBlock).hide();

    $('#blockParam').empty();
    if(moduleID == '') return false;

    if(moduleID.indexOf('hiddenBlock') != -1)
    {
        getNotSourceParams('html', moduleID.replace('hiddenBlock', ''));
        return true;
    }
    if(moduleID == 'html' || moduleID == 'dynamic' || moduleID == 'bulletin' || moduleID == 'flowchart')
    {
        getNotSourceParams(moduleID);
        return true;
    }

    $.get(createLink('block', 'main', 'module=' + moduleID + '&id=' + blockID), {mode:'getblocklist'}, function(data)
    {
        $(moduleBlock).html(data);
        $(moduleBlock).show();
        $.ajustModalPosition();
    })
}