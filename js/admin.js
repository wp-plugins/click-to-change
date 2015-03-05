jQuery(function() {
	jQuery('.wcp-click-change img').hide();
	jQuery('#wcp-save-post').click(function() {
		jQuery('.wcp-click-change img').show();

		// alert(wcpAjax.url);
		var title = jQuery('#wcp-title').html();
		var content = jQuery('#wcp-content').html();
		var id = jQuery(this).data('id');
		// console.log(content);

		var data = {
			action: 'wcp_change_post_database',
			title: title,
			content: content,
			postid: id,
		}

		jQuery.post(wcpAjax.url, data, function(resp) {
			jQuery('.wcp-click-change img').hide();
			alert(resp);
		});
	});
});