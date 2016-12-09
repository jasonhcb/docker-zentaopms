<style>
    .table-datatable tbody > tr td,
    .table-datatable thead > tr th {max-height: 34px; line-height: 21px;}
    .table-datatable tbody > tr td .btn-icon > i {line-height: 19px;}
    .hide-side .table-datatable thead > tr > th.check-btn i {visibility: hidden;}
    .hide-side .side-handle {line-height: 33px}
    .table-datatable .checkbox-row {display: none}
    .outer .datatable {border: 1px solid #ddd;}
    .outer .datatable .table, .outer .datatable .table tfoot td {border: none; box-shadow: none}
    .datatable .table>tbody>tr.active>td.col-hover, .datatable .table>tbody>tr.active.hover>td {background-color: #f3eed8 !important;}
    .datatable-span.flexarea .scroll-slide {bottom: -30px}

    .panel > .datatable, .panel-body > .datatable {margin-bottom: 0;}
    .outer .main .table tfoot tr > td:first-child {padding-left: 8px;}
</style>
<script>
    $(function()
    {
        var $datatable = $('table.datatable').first();

        $datatable.datatable(
                {
                    customizable: false,
                    sortable: false,
                    scrollPos: 'out',
                    tableClass: 'tablesorter',
                    storage: false,
                    ready: function() {
                    }
                });
        setTimeout(function() {
            fixScroll();
        }, 500);
        setTimeout(function() {
            fixedTfootAction('#batchForm');
        }, 100);
    });
    function fixScroll()
    {
        var $scrollwrapper = $('div.datatable').first().find('.scroll-wrapper:first');
        if ($scrollwrapper.size() == 0)
            return;

        var $tfoot = $('div.datatable').first().find('table tfoot:last');
        var scrollOffset = $scrollwrapper.offset().top + $scrollwrapper.find('.scroll-slide').height();
        if ($tfoot.size() > 0)
            scrollOffset += $tfoot.height();
        if ($('div.datatable.head-fixed').size() == 0)
            scrollOffset -= '34';
        var windowH = $(window).height();
        var bottom = $tfoot.hasClass('fixedTfootAction') ? 53 + $tfoot.height() : 53;
        if (scrollOffset > windowH + $(window).scrollTop())
            $scrollwrapper.css({'position': 'fixed', 'bottom': bottom + 'px'});
        $(window).scroll(function()
        {
            newBottom = $tfoot.hasClass('fixedTfootAction') ? 53 + $tfoot.height() : 53;
            if (scrollOffset <= windowH + $(window).scrollTop())
            {
                $scrollwrapper.css({'position': 'relative', 'bottom': '0px'});
            }
            else if ($scrollwrapper.css('position') != 'fixed' || bottom != newBottom)
            {
                $scrollwrapper.css({'position': 'fixed', 'bottom': newBottom + 'px'});
                bottom = newBottom;
            }
        });
    }
</script>
