$('#redactor').redactor({
    imageUpload: '/ajax/redactor/core/uploadImage/',
    fileUpload: '/ajax/redactor/core/uploadFile/',
    plugins: ['table', 'video', 'source'],
    imagePosition: true,
    imageResizable: true
});

$(function() {
    var group = $("ol.edit-menu").sortable({
        group: 'edit-menu',
        handle: 'i.icon-cursor-move',
        onDragStart: function ($item, container, _super) {
            // Duplicate items of the no drop area
            if(!container.options.drop)
                $item.clone().insertAfter($item);
                _super($item, container);
        },
        onDrop: function ($item, container, _super) {
            var data = group.sortable("serialize").get();
            var jsonString = JSON.stringify(data, null, ' ');
            var formData = new FormData();
            
            if ($('#sortMenuId').data() !== null) {
                formData.append('data', jsonString);
                formData.append('menu_id', $('#sortMenuId').val());

                var url = '/admin/settings/ajaxMenuSortItems/';
            } 

            if ($('#sortCategoryId').data() !== null) {
                formData.append('data', jsonString);
                formData.append('category_id', $('#sortCategoryId').val());

                var url = '/admin/settings/ajaxCategorySortItems/';
            }




            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(){

                },
                success: function(result){

                }
            });

            _super($item, container);
        }
    });
});
