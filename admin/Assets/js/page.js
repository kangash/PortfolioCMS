var file;

$('input[type=file]').on('change', function() {
    file = this.files;
});

var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());

        $.ajax({
            url: '/admin/page/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                console.log(result);
                window.location = '/admin/pages/edit/' + result;
            }
        });
    },
    update: function(button) {
        var formData = new FormData();
        $(button).addClass('loading');

        formData.append('page_id', $('#formPageId').val());
        formData.append('segment', $('#formSegment').val());
        formData.append('title', $('#formTitle').val());
        formData.append('content', $('.redactor-editor').html());
        formData.append('status', $('#status').val());
        formData.append('category', $('#category').val());
        formData.append('type', $('#type').val());
        formData.append('image', $('#formImageActive').val());

        if (typeof file !== 'undefined') {
            $.each( file, function( key, value ){
                formData.append( key, value );
            });
        }

        $.ajax({
            url: '/admin/page/update/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(respond, string, xmlObject) {

                var html = '';
                if (typeof respond.error === 'undefined') {
                    // $.each( respond.files, function (key, val) {
                    //     html += val;
                    // })
                    respond.files.forEach( (el) => {
                        html += el;
                    });
                } else {
                    respond.error.forEach( (el) => {
                        html += el;
                    });
                }
                $('.ajax-reply').html( html );

                if (typeof respond !== 'string') {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }


            }
        });
    }
};
