(function() {

    //create empty object in the global em var, dont forget to add the init call in the main.js!
    em.ajax = {};

    //call any functions to be trigger on dom ready
    em.ajax.init = function() {
        em.ajax.postsSearch();
    };

    em.ajax.postsSearch = function() {

        var form = $('form.ajax-posts');

        //an example of a js ajax call
        form.on('submit', function(e) {

            e.preventDefault();

            //get form and other vars
            var form = $(this);
            var errorList = form.find('.ajax-posts__errors');
            var url = '/wp-site/wp/wp-admin/admin-ajax.php';
            var results = form.find('.ajax-posts__results');

            //some filter options
            var paged = form.find('input[name="paged"]');
            var per_page = form.find('input[name="per_page"]');

            //lets add a little loading icon, for more demo purposes
            form.find('.ajax-posts__show-more i').addClass('fa-spin');

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
                success: function(resp) {

                    //empty list as we now have a resp
                    errorList.empty();

                    //if no errors
                    if (resp.errors.length === 0) {

                        //lets increment the paged values
                        paged.val( function(i, oldval) {
                            return ++oldval;
                        });

                        //append resp to target
                        results.append($(resp.data.html));

                        //lets recapture the items to animate
                        em.animations.capture();
                    } else {

                        $('.ajax-posts__show-more').css({opacity: 0, visibility: 'hidden'});

                        //loop errors
                        for (var error in resp.errors) {
                            if(error == 'end'){
                                continue;
                            }

                            //create error list item
                            var li = $('<li></li>');
                            li.html(resp.errors[error]);
                            errorList.append(li);
                        }
                    }

                    //for more demo purposes
                    form.find('.ajax-posts__show-more i').removeClass('fa-spin');

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

        //a default submit upon page load
        form.submit();

        //lets now add a little click handler for the show more button
        form.find('.ajax-posts__show-more').on('click', function(e) {
            e.preventDefault();
            form.submit();
        });

    };

})();
