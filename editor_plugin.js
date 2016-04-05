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
        });
    });
})();