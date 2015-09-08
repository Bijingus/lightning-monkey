jQuery(document).ready(function(){
  	var mediaUploader;

	jQuery('#logo-button').live("click", function(e) {
		buttonId = this.id;
	e.preventDefault();
	// If the uploader object has already been created, reopen the dialog
	  if (mediaUploader) {
	  mediaUploader.open();
	  return;
	}
	// Extend the wp.media object
	mediaUploader = wp.media.frames.file_frame = wp.media({
	  title: 'Choose Image',
	  button: {
	  text: 'Choose Image'
	}, multiple: false });

	// When a file is selected, grab the URL and set it as the text field's value
	mediaUploader.on('select', function() {
	  attachment = mediaUploader.state().get('selection').first().toJSON();
	  jQuery('#img-url').val(attachment.url);
	});
	// Open the uploader dialog
	mediaUploader.open();
	});
});

// tabs
jQuery(function() {
	jQuery( "#tabs" ).tabs({
 		active: 0
	});
});