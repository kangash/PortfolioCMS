var setting = {
    ajaxMethod: 'POST',

    update: function() {
        var formData = $('#settingForm').serialize();

        $.ajax({
            url: '/admin/settings/update/',
            type: this.ajaxMethod,
            data: formData,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                window.location.reload();
            }
        });
    },
    setActiveTheme: function(element, theme) {
        var formData = new FormData();
        var button   = $(element);

        formData.append('theme', theme);


        $.ajax({
            url: '/admin/settings/activeTheme/',
            type: this.ajaxMethod,
            data: formData,
            cacha: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                button.addClass('loading');
            },
            success: function() {
                window.location.reload();
            }
        });

    }
};