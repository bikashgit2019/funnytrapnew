jQuery(document).ready(function($){
	/* Newletters js starts here */      
        
            if(pn_setings.do_tour){
                
                var content = '<h3>You are awesome for using Push Notification!</h3>';
                content += '<p>Do you want the latest on <b>Push Notification update</b> before others and some best resources on monetization in a single email? - Free just for users of Push Notification!</p>';
                        content += '<style type="text/css">';
                        content += '.wp-pointer-buttons{ padding:0; overflow: hidden; }';
                        content += '.wp-pointer-content .button-secondary{  left: -25px;background: transparent;top: 5px; border: 0;position: relative; padding: 0; box-shadow: none;margin: 0;color: #0085ba;} .wp-pointer-content .button-primary{ display:none}  #pn_mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }';
                        content += '</style>';                        
                        content += '<div id="pn_mc_embed_signup">';
                        content += '<form id="pushnotification-subscribe-newsletter-form" method="POST">';
                        content += '<div id="pn_mc_embed_signup_scroll">';
                        content += '<div class="pn-mc-field-group" style="    margin-left: 15px;    width: 195px;    float: left;">';
                        content += '<input type="text" name="name" class="form-control" placeholder="Name" hidden value="'+pn_setings.current_user_name+'" style="display:none">';
                        content += '<input type="text" value="'+pn_setings.current_user_email+'" name="email" class="form-control" placeholder="Email*"  style="      width: 180px;    padding: 6px 5px;">';
                        content += '<input type="text" name="company" class="form-control" placeholder="Website" hidden style=" display:none; width: 168px; padding: 6px 5px;" value="'+pn_setings.get_home_url+'">';
                        content += '<input type="hidden" name="ml-submit" value="1" />';
                        content += '</div>';
                        content += '<div id="mce-responses">';
                        content += '<div class="response" id="mce-error-response" style="display:none"></div>';
                        content += '<div class="response" id="mce-success-response" style="display:none"></div>';
                        content += '</div>';
                        content += '<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a631df13442f19caede5a5baf_c9a71edce6" tabindex="-1" value=""></div>';
                        content += '<input type="submit" value="Subscribe" name="subscribe" class="button mc-newsletter-sent" style=" background: #0085ba; border-color: #006799; padding: 0px 16px; text-shadow: 0 -1px 1px #006799,1px 0 1px #006799,0 1px 1px #006799,-1px 0 1px #006799; height: 30px; margin-top: 1px; color: #fff; box-shadow: 0 1px 0 #006799;">';
                        content += '</div>';
                        content += '</form>';
                        content += '</div>';
                
                var setup;                
                var wp_pointers_tour_opts = {
                    content:content,
                    position:{
                        edge:"left",
                        align:"left"
                    }
                };
                                
                wp_pointers_tour_opts = jQuery.extend (wp_pointers_tour_opts, {
                        buttons: function (event, t) {
                                button= jQuery ('<a id="pointer-close" class="button-secondary">' + pn_setings.button1 + '</a>');
                                button_2= jQuery ('#pointer-close.button');
                                button.bind ('click.pointer', function () {
                                        t.element.pointer ('close');
                                });
                                button_2.on('click', function() {
                                        t.element.pointer ('close');
                                } );
                                return button;
                        },
                        close: function () {
                                jQuery.post (pn_setings.ajax_url, {
                                        pointer: 'pushnotification_subscribe_pointer',
                                        action: 'dismiss-wp-pointer'
                                });
                        },
                        show: function(event, t){
                         t.pointer.css({'left':'170px', 'top':'160px'});
                      }                                               
                });
                setup = function () {
                        jQuery(pn_setings.displayID).pointer(wp_pointers_tour_opts).pointer('open');
                         if (pn_setings.button2) {
                                jQuery ('#pointer-close').after ('<a id="pointer-primary" class="button-primary">' + pn_setings.button2+ '</a>');
                                jQuery ('#pointer-primary').click (function () {
                                        pn_setings.function_name;
                                });
                                jQuery ('#pointer-close').click (function () {
                                        jQuery.post (pn_setings.ajax_url, {
                                                pointer: 'pushnotification_subscribe_pointer',
                                                action: 'dismiss-wp-pointer'
                                        });
                                });
                         }
                };
                if (wp_pointers_tour_opts.position && wp_pointers_tour_opts.position.defer_loading) {
                        jQuery(window).bind('load.wp-pointers', setup);
                }
                else {
                        setup ();
                }
                
            }
                
    /* Newletters js ends here */ 
    /*Newsletter submission*/
    jQuery("#pushnotification-subscribe-newsletter-form").on('submit',function(e){
        e.preventDefault();
        var form = jQuery(this);
        var name = form.find('input[name="name"]').val();
        var email = form.find('input[name="email"]').val();
        var website = form.find('input[name="company"]').val();
        jQuery.post(pn_setings.ajax_url, {action:'pn_subscribe_newsletter',name:name, email:email,website:website, nonce: pn_setings.remote_nonce},
          function(data) {
              jQuery.post (pn_setings.ajax_url, {
                      pointer: 'pushnotification_subscribe_pointer',
                      action: 'dismiss-wp-pointer'
              }, function(){
                location.reload();
              });
          }
        );
    });
    /*Newsletter submission End*/




	jQuery("#user_auth_vadation").click(function(){
		var self = jQuery(this);
		var tokenKey = jQuery("#user_auth_token_key").val().trim();
		//console.log(tokenKey);
		if(tokenKey==''){
			alert("Please enter valid token");
			return false;
		}
		self.addClass('button updating-message');
		var messagediv = self.parents('fieldset').find(".resp_message")
		messagediv.html("");
		jQuery.ajax({
			url: ajaxurl,
			method: "post",
			dataType: 'json',
			data: { user_token: tokenKey, action: "pn_verify_user", nonce: pn_setings.remote_nonce },
			success: function(response){
				
				if(response.status==200){
					messagediv.html(response.message);
					messagediv.css({"color": "green"})

					window.location.reload();
				}else{
					messagediv.html(response.message);
					messagediv.css({"color": "red"})
				}
				self.removeClass('updating-message');
			},
			error:function(response){
				var messagediv = self.parents('fieldset').find(".resp_message")
				messagediv.html(response.responseJSON.message)
				messagediv.css({"color": "red"})

			}
		})
	})

	jQuery("#pn-remove-apikey").click(function(){
		var self = jQuery(this);
		self.addClass('button updating-message');
		jQuery.ajax({
			url: ajaxurl,
			method: "post",
			dataType: 'json',
			data: { action: "pn_revoke_keys", nonce: pn_setings.remote_nonce },
			success: function(response){
				
				if(response.status==200){
					self.after("&nbsp; "+response.message);
					
					window.location.reload();
				}else{
					self.after(response.message);
				}
				self.removeClass('updating-message');
			},
			error:function(response){
				var messagediv = self.parents('fieldset').find(".resp_message")
				messagediv.html(response.responseJSON.message)
				messagediv.css({"color": "red"})

			}
		})
	})
	jQuery("#grab-subscribers-data").click(function(){
		var self = jQuery(this);
		self.addClass('button updating-message');
		jQuery.ajax({
			url: ajaxurl,
			method: "post",
			dataType: 'json',
			data: { action: "pn_subscribers_data", nonce: pn_setings.remote_nonce },
			success: function(response){
				
				if(response.status==200){
					self.after("&nbsp; "+response.message);
					
					window.location.reload();
				}else{
					self.after(response.message);
				}
				self.removeClass('updating-message');
			},
			error:function(response){
				var messagediv = self.parents('fieldset').find(".resp_message")
				messagediv.html(response.responseJSON.message)
				messagediv.css({"color": "red"})

			}
		})
	})


	jQuery("#pn-send-custom-notification").click(function(){
		var self = jQuery(this);
		var title 	 = jQuery('#notification-title').val();
		var link_url 	 = jQuery('#notification-link').val();
		var image_url = jQuery('#notification-imageurl').val();
		var message  = jQuery('#notification-message').val();
		self.addClass('button updating-message');
		jQuery.ajax({
			url: ajaxurl,
			method: "post",
			dataType: 'json',
			data: { action: "pn_send_notification", nonce: pn_setings.remote_nonce, 
				title: title,
				link_url: link_url,
				image_url: image_url,
				message: message
				},
			success: function(response){
				
				if(response.status==200){
					jQuery(".pn-send-messageDiv").html("&nbsp; "+response.message).css({"color":"green"});
					
					jQuery('#notification-title').val("");
					jQuery('#notification-link').val("");
					jQuery('#notification-imageurl').val("");
					jQuery('#notification-message').val("");
				}else{
					jQuery(".pn-send-messageDiv").html("&nbsp; "+response.message).css({"color":"green"});
				}
				self.removeClass('updating-message');
			},
			error:function(response){
				var messagediv = self.parents('fieldset').find(".resp_message")
				messagediv.html(response.responseJSON.message)
				messagediv.css({"color": "red"})

			}
		})
	})
	jQuery('.checkbox_operator').click(function(e){
		var value = 0;
		var target = jQuery(this).parent('.checkbox_wrapper').find('.checkbox_target');
		if(jQuery(this).prop("checked")==true){
			var value = target.attr("data-truevalue");
		}
		target.val(value);
	})
});