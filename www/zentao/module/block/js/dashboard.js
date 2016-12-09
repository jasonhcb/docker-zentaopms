/**
 * Delete block.
 * 
 * @param  int    $index 
 * @access public
 * @return void
 */
function deleteBlock(index)
{
    $.getJSON(createLink('block', 'delete', 'index=' + index + '&module=' + module), function(data)
    {   
        if(data.result != 'success')
        {   
            alert(data.message);
            return false;
        }

        checkEmpty();
    })  
}

/**
 * Sort blocks.
 * 
 * @param  object $orders  format is {'block2' : 1, 'block1' : 2, oldOrder : newOrder} 
 * @access public
 * @return void
 */
function sortBlocks(orders)
{

    var ordersMap = [];
    $.each(orders, function(blockId, order) {ordersMap.push({id: blockId, order: order});});
    ordersMap.sort(function(a, b) {return a.order - b.order;});
    var newOrders = $.map(ordersMap, function(order, idx) {return order.id});

    $.getJSON(createLink('block', 'sort', 'orders=' + newOrders.join(',') + '&module=' + module), function(data)
    {
        // if(data.result == 'success') $.zui.messager.success(config.ordersSaved);
    });
}

/**
 * Check dashboard wether is empty
 * @access public
 * @return void
 */
function checkEmpty()
{
    var $dashboard = $('#dashboard');
    var hasBlocks = !!$dashboard.children('.row').children().length;
    $dashboard.find('.dashboard-empty-message').toggleClass('hide', hasBlocks);
    if(!hasBlocks) $dashboard.find('.dashboard-actions').addClass('hide');
}

/**
 * Resize block
 * @param  object $event
 * @access public
 * @return void
 */
function resizeBlock(event)
{
    var blockID = event.element.find('.panel').data('id');
    $.getJSON(createLink('block', 'resize', 'id=' + blockID + '&grid=' + event.grid), function(data)
    {
        if(data.result !== 'success') event.revert();
    });
    initTableHeader();
}

/**
 * Init table header
 * @access public
 * @return void
 */
function initTableHeader()
{
    $('#dashboard .panel-block').each(function()
    {
        var $panel = $(this);
        var $table = $panel.find('.table:first');

        if(!$table.length || !$table.children('thead').length) return;
        var isFixed = $panel.find('.panel-body').height() < $table.outerHeight();

        $panel.toggleClass('with-fixed-header', isFixed);
        var $header = $panel.children('.table-header-fixed').toggle(isFixed);
        if(!isFixed) return;
        if(!$header.length)
        {
            $header = $('<div class="table-header-fixed" style="position: absolute; left: 0; top: 0; right: 0;"><table class="table table-fixed"></table></div>').css('right', $panel.width() - $table.width()).css('min-width', $table.width());
            $header.find('.table').addClass($table.attr('class')).append($table.find('thead').css('visibility', 'hidden').clone().css('visibility', 'visible'));
            $panel.addClass('with-fixed-header').append($header);
            var $heading = $panel.children('.panel-heading');
            if($heading.length) $header.css('top', $heading.outerHeight());
        }
        else
        {
            var $fixedTh = $header.css('min-width', $table.width()).find('thead > tr > th');
            $table.find('thead > tr > th').each(function(idx)
            {
                $fixedTh.eq(idx).width($(this).width());
            });
        }
    });
}

/**
 * Check refresh progress
 * @param  object $dashboard
 * @access public
 * @return void
 */
function checkRefreshProgress($dashboard, doneCallback)
{
    if($dashboard.find('.panel-loading').length) setTimeout(function() {checkRefreshProgress($dashboard, doneCallback);}, 500);
    else doneCallback();
}
/**
 * Hidden block.
 *
 * @param  index $index
 * @access public
 * @return void
 */ 
function hiddenBlock(index)
{
    $.getJSON(createLink('block', 'delete', 'index=' + index + '&module=' + module + '&type=hidden'), function(data)
    {
        if(data.result != 'success')
        {
            alert(data.message);
            return false;
        }

        $('#dashboard #block' + index).addClass('hidden');
    })
}

$(function()
{
    var $dashboard = $('#dashboard').dashboard(
    {
        height            : 240,
        draggable         : !useGuest,
        shadowType        : false,
        afterOrdered      : sortBlocks,
        afterPanelRemoved : deleteBlock,
        sensitive         : true,
        panelRemovingTip  : config.confirmRemoveBlock,
        resizable         : !useGuest,
        onResize          : resizeBlock,
        afterRefresh      : initTableHeader
    });

    // $dashboard.find('ul.dashboard-actions').addClass('hide').children('li').addClass('right').appendTo($('#modulemenu > .nav'));
    $dashboard.find('[data-toggle=tooltip]').tooltip({container: 'body'});

    checkEmpty();
    initTableHeader();
});
