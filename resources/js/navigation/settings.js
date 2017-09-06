$(function () {

console.log('#1');
    /**
     * Allow reordering the navigation.
     */
    $('#sidebar > ul').sortable({
        nested: false,
        placeholder: '<li class="placeholder"/>',
        afterMove: function ($placeholder) {
            $placeholder.closest('ul').find('.dragged').detach().insertBefore($placeholder);
        },
        onDrop: function ($item, container, _super) {
            console.log('#2');
            var navigation = [];

            $('#sidebar > ul > li').each(function () {
                navigation.push(String($(this).data('slug')));
            });

            $.post(
                REQUEST_ROOT_PATH + '/admin/settings/themes/pixney.theme.fiske/navigation',
                {
                    'navigation': navigation
                }
            );

            _super($item, container);
        }
    });
});
