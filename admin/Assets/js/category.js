var category = {
    listItems: $('#listItems'),

    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();
        var categoryName = $('#categoryName').val();

        console.log(categoryName);
        formData.append('name', categoryName);

        if (categoryName.length < 1) {
            return false;
        }

        $.ajax({
            url: '/admin/settings/ajaxCategoryAdd/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

                if (result > 0) {
                    location.reload();
                }
            }
        });
    },
    addItem: function(categoryId) {
        var formData = new FormData();

        formData.append('category_id', categoryId);

        if (categoryId < 1) {
            return false;
        }

        var _this = this;
        $.ajax({
            url: '/admin/settings/ajaxCategoryAddItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                
                if (result) {
                    _this.listItems.append(result);
                }
            }
        });
    },


    updateItem: function(itemId, field, element) {
        var formData = new FormData();

        formData.append('item_id', itemId);
        formData.append('field', field);
        formData.append('value', $(element).val());

        if (itemId < 1) {
            return false;
        }

        var _this = this;

        $.ajax({
            url: '/admin/settings/ajaxCategoryUpdateItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {

            },
            success: function(result) {
                if (result) {

                }
            }
        });
    },
    removeItem: function(itemId) {

        if(!confirm('Delete the category item?')) {
            
            return false;
        }

        var formData = new FormData();

        formData.append('item_id', itemId);

        if (itemId < 1) {
            return false;
        }

        $.ajax({
            url: '/admin/settings/ajaxCategoryRemoveItem/',
            type: this.ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                $('.menu-item-' + itemId).remove();
            }
        });
    }
};