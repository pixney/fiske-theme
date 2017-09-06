$(function () {

    /**
     * Allow reordering the navigation.
     */
    $('#sidebar > ul').sortable({
        nested: false,
        handle:'.handle',
        placeholder: '<li class="placeholder"/>',
        afterMove: function ($placeholder) {
            $placeholder.closest('ul').find('.dragged').detach().insertBefore($placeholder);
        },
        onDrop: function ($item, container, _super) {

            var navigation = [];

            $('#sidebar > ul > li').each(function () {
                navigation.push(String($(this).data('slug')));
            });
            
            $.post(
                REQUEST_ROOT_PATH + '/admin/preferences/themes/pixney.theme.fiske/navigation',
                {
                    'navigation': navigation
                }
            );

            _super($item, container);
        }
    });
});
