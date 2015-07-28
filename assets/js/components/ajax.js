(function() {

    //create empty object in the global em var, dont forget to add the init call in the main.js!
    em.ajax = {};

    //call any functions to be trigger on dom ready
    em.ajax.init = function() {
        em.ajax.basic();
    };

    em.ajax.basic = function() {

        //an example of a js ajax call
        $('form.form-ajax').on('submit', function(event) {

            event.preventDefault();

            //get form and other vars
            var form = $(this);
            var errorList = form.find('ul.errors');
            var url = '/wp-site/wp/wp-admin/admin-ajax.php';
            var target = $('.' + form.data('target'));
            var offset = form.find('input[name="offset"]');
            var per_page = form.find('input[name="per_page"]');

            //lets add a little loading icon, for more demo purposes
            form.find('button[type="submit"] i').addClass('fa-spin');

            //gather and serialize form data
            var formData = form.serializeArray();
            formData.push({
                name: 'action',
                value: form.attr('action')
            });

            //lets create the ajax request and handlers
            $.ajax({
                url: url,
                type: form.attr('method'),
                data: formData,
                success: function(data) {

                    //if no errors
                    if (data.errors.length == 0) {

                        //empty list as we now have data
                        errorList.empty();

                        //setup target to append our ajax data
                        if (target.length == 0) {
                            form.after('<div></div>');

                            target = form.next();
                        }

                        //lets increment the offset values
                        offset.val(parseInt(offset.val()) + parseInt(per_page.val()));

                        //append data to target
                        target.append($(data.html));
                    } else {

                        //empty list and loop errors
                        errorList.empty();
                        for (var error in data.errors) {

                            //create error list item
                            var li = $('<li></li>');
                            li.html(data.errors[error]);
                            errorList.append(li);

                            //and/or add error class to input
                            form.find('*[name="' + error + '"]').addClass('error');
                        };
                    }

                    //for more demo purposes
                    form.find('button[type="submit"] i').removeClass('fa-spin');

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    var log = [
                        'Issues requesting: ' + url,
                        errorThrown
                    ];
                    console.log(log);
                }
            });
        });

    };

})();
