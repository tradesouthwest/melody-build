/* mldyflx script for columns in tinymce editor 
 * This TinyMCE Integration is maintained by a third-party developer, TradeSouthWest. Tiny Technologies, Inc. bears no responsibility for this integration, which is not covered by the Tiny Self-Hosted Software License Agreement. For issues related to the integration, contact the third-party project directly.
*/

window.addEventListener('DOMContentLoaded', (event) => {

    tinymce.PluginManager.add( 'column', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('column', {
            title: 'Insert 1 Column',
            cmd: 'column',
            image: url + '/mxmtic-1.png',
        });
        editor.addCommand('column', function() {
            var selected_text = 'sample content\u2060'; /*editor.selection.getContent({
                'format': 'html'
            }); */
            if ( selected_text.length === 0 ) {
                alert( 'Please select some text.' );
                return;
            }
            var open_column = '<div class="mldyflx-row"><div class="mldyflx-wide">';
            var close_column = '</div></div>';
            
            var return_text = '';
            return_text = open_column + selected_text + close_column;
            editor.execCommand('mceInsertContent', false, return_text + '<br>');
            return;
        });
    });

    tinymce.PluginManager.add( 'columns', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('columns', {
            title: 'Insert 2 Columns',
            cmd: 'columns',
            image: url + '/mxmtic-2.png',
        });
        editor.addCommand('columns', function() {
        
            var selected_text = '\u2060'; /*editor.selection.getContent({
                'format': 'html'
            }) + 'sample content'; */
            if ( selected_text.length === 0 ) {
                alert( 'Please set some text.' );
                return;
            }
            var open_column = '<div class="mldyflx-row"><div class="mldyflx-half">';
            var close_column = '</div>';
            var open_culumn = '<div class="mldyflx-half">';
            var close_culumn = '</div></div>';
            
			var return_text = '';
            return_text = open_column + selected_text + close_column
						+ open_culumn + selected_text + close_culumn;
            editor.execCommand('mceInsertContent', false, return_text + '<br>');
            return;
        });
    });

    tinymce.PluginManager.add( 'columnsThree', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('columnsThree', {
            title: 'Insert 3 Columns',
            cmd: 'columnsThree',
            image: url + '/mxmtic-3.png',
        });
        editor.addCommand('columnsThree', function() {
            var selected_text = 'sample content\u2060'; /*editor.selection.getContent({
                'format': 'html'
            });*/
            if ( selected_text.length === 0 ) {
                alert( 'Please select some text.' );
                return;
            }
            var open_column = '<div class="mldyflx-row"><div class="mldyflx-thirds">';
            var close_column = '</div>';
            var open_columnb = '<div class="mldyflx-thirds">';
            var close_columnb = '</div>';
            var open_culumn = '<div class="mldyflx-thirds">';
            var close_culumn = '</div></div>';
            
			var return_text = '';
            return_text = open_column + selected_text + close_column
                        + open_columnb + selected_text + close_columnb
						+ open_culumn + selected_text + close_culumn;
            editor.execCommand('mceInsertContent', false, return_text + '<br>');
            return;
        });
	});

    tinymce.PluginManager.add( 'columnsFour', function( editor, url ) {
        // Add Button to Visual Editor Toolbar
        editor.addButton('columnsFour', {
            title: 'Insert 4 Columns',
            cmd: 'columnsFour',
            image: url + '/mxmtic-4.png',
        });
        editor.addCommand('columnsFour', function() {
            var selected_text = 'sample content\u2060'; /*editor.selection.getContent({
                'format': 'html'
            });*/
            if ( selected_text.length === 0 ) {
                alert( 'Please select some text.' );
                return;
            }
            var open_column = '<div class="mldyflx-row"><div class="mldyflx-quarters">';
            var close_column = '</div>';
            var open_columnb = '<div class="mldyflx-quarters">';
            var close_columnb = '</div>';
            var open_columnc = '<div class="mldyflx-quarters">';
            var close_columnc = '</div>';
            var open_culumn = '<div class="mldyflx-quarters">';
            var close_culumn = '</div></div>';
            
			var return_text = '';
            return_text = open_column + selected_text + close_column
                        + open_columnb + selected_text + close_columnb
                        + open_columnc + selected_text + close_columnc
						+ open_culumn + selected_text + close_culumn;
            editor.execCommand('mceInsertContent', false, return_text + '<br>');
            return;
        });
	});
    /*
    function endCommand() {
        tinymce.activeEditor.selection.select(tinyMCE.activeEditor.getBody(), true);
        tinymce.activeEditor.selection.collapse(false);
        tinymce.activeEditor.focus();
      }
      */
//console.log('DOM fully loaded and parsed');
}); 
