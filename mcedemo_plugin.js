// http://www.tinymce.com/wiki.php/api4:class.tinymce.Plugin

(function() {

    tinymce.create('tinymce.plugins.WRAP', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished its initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {

            /* wrapping button take 1 */
            ed.addButton('demobutton0', {
                title : 'Wrap Selection in green!',
                cmd : 'mceWRAP',
                image : url + '/coffee.png'
                // image : '/wp-admin/images/marker.png'
            });
                ed.addCommand('mceWRAP', function() {
                    selection = ed.selection.getContent();
                    ed.selection.setContent('<span style="background: green;">' + selection + '</span>');
                });

            /* wrapping button take 2 */
            ed.addButton('demobutton1', {
                text: 'Wrap Selection',
                title: 'Make it orange!',
                icon: false,
                onclick: function() {
                    selection = ed.selection.getContent();
                    ed.selection.setContent('<span style="background: orange;">' + selection + '</span>');
                }
            });

            /* insert text with button */
            ed.addButton('demobutton2', {
                text: 'Insert Text',
                icon: false,
                onclick: function() {
                    // Open window
                    ed.windowManager.open({
                        title: 'Example plugin',
                        body: [
                            {type: 'textbox', name: 'title', label: 'Title'}
                        ],
                        onsubmit: function(e) {
                            // Insert content when the window form is submitted
                            ed.insertContent('Title: ' + e.data.title);
                        }
                    });
                }
            });

            /* insert text with list box */
            ed.addButton('demobutton3', {
                type: 'listbox', 
                text: 'Insert Text', // dashes to alleviate some padding issues
                fixedWidth: true,
                icon: false,
                values: [
                    {text: 'Menu item 1', value: 'Some text 1'},
                    {text: 'Menu item 2', value: 'Some text 2'},
                    {text: 'Menu item Threeeeeeeeeeee', value: 'Some text 3'}
                ],
                // onPostRender: function() {
                //     // Select the second item by default
                //     this.value('Some text 2');
                // },
                onselect: function(e) {
                    ed.insertContent(this.value());
                }
            });

        }

    });

    // Register plugin
    tinymce.PluginManager.add('DEMO', tinymce.plugins.WRAP);

})();