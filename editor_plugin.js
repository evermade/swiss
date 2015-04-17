(function() {
    tinymce.PluginManager.add('custom_mce_em_buttons', function(editor, url) {
        editor.addButton('custom_mce_em_buttons', {
            icon: false,
            text: 'Button',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Insert Button',
                    body: [{
                        type: 'textbox',
                        name: 'buttonName',
                        label: 'Button Text',
                        value: ''
                    },
                    {
                        type: 'textbox',
                        name: 'buttonUrl',
                        label: 'Link',
                        value: ''
                    },
                    {
                        type: 'listbox',
                        name: 'className',
                        label: 'Style',
                        values: [{
                            text: 'Normal',
                            value: 'btn'
                        }, {
                            text: 'Green',
                            value: 'btn--green'
                        },
                        {
                            text: 'Media',
                            value: 'btn--icon btn--icon--media'
                        }
                        ]
                    }, ],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[button class=&quot;' +  e.data.className + '&quot; text=&quot;' + e.data.buttonName + '&quot; url=&quot;' + e.data.buttonUrl + '&quot; ]' +
                            editor.selection
                            .getContent()
                        );
                    }
                });
            }
        }),
        editor.addButton('custom_mce_em_posts', {
            icon: false,
            text: 'Posts',
            onclick: function() {
                editor.windowManager.open({
                    title: 'Insert Posts',
                    body: [{
                        type: 'textbox',
                        name: 'number',
                        label: 'How many?',
                        value: ''
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[posts number=&quot;' +  e.data.number + '&quot; ]'
                        );
                    }
                });
            }
        });
    });
})();