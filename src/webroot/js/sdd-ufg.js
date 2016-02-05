$(document).ready(function() {
    $('.datepicker').datepicker({
        language: 'pt-BR'
    });

    $('.sidebar-menu .treeview-menu a').click(function() {
        var li = $(this).parent();
        var menu = li.parent().parent().hasClass('treeview') ? li.parent().parent() : null;
        sessionStorage.setItem('menu-tree', menu.index());
    });

    var menuTree = sessionStorage.getItem('menu-tree');
    if(menuTree !== null) {
        var used = $('.sidebar-menu').children().eq(menuTree);
        used.children().first().trigger('click');
    }
});
