(function() {
  // Let's add our custom buttons to the editor
  tinymce.PluginManager.add('custom_mce_em_buttons', function(editor, url) {

    // Let's add our button shortcode
    editor.addButton('custom_mce_em_button', {
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
              text: 'Default',
              value: ''
            },
            {
              text: 'White',
              value: 'c-btn--white'
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

    // Let's add a lorem generator for primary dev use to spin ourselves some content
    editor.addButton('custom_mce_em_lorem', {
      icon: false,
      text: 'Lorem',
      onclick: function() {
        editor.insertContent('<p>This is a paragraph of text. Some of the text may be <em>emphasised</em> and some it might even be <strong>strongly emphasised</strong>. Occasionally <q>quoted text</q> may be found within a paragraph &hellip;and of course <a href="#">a link</a> may appear at any point in the text. The average paragraph contains five or six sentences although some may contain as little or one or two while others carry on for anything up to ten sentences and beyond.</p>');
      }
    });

  });
})();
