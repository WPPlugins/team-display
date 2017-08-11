jQuery(document).ready(function($) {

    jQuery('.moreimages span').remove();
    jQuery('.preview').hide();
    jQuery('#la-loader').hide();
  jQuery('#la-saved').hide();
  $('.capbgtype').each(function(index, el) {
        if ($(this).val()==='image') {
            //$(this).closest('.form-table').find('.bgimagerow')
            $(this).closest('.form-table').find('.bgimagerow').show();
            $(this).closest('.form-table').find('.bgcolorrow').hide();
        }else if($(this).val()==='color'){
            $(this).closest('.form-table').find('.bgcolorrow').show();
            $(this).closest('.form-table').find('.bgimagerow').hide();           
        };
    });
  $('#team-container').on('change', '.capbgtype', function(event) {
        event.preventDefault();
        if ($(this).val()=='image') {
            $(this).closest('.form-table').find('.bgcolorrow').hide();
            $(this).closest('.form-table').find('.bgimagerow').show();
        }else if($(this).val()=='color'){
            $(this).closest('.form-table').find('.bgimagerow').hide();
            $(this).closest('.form-table').find('.bgcolorrow').show();
        };
    });

    setTimeout(function() {
        jQuery('#faqs-container >.ui-accordion-content').first().addClass('firstelement');
    }, 40);

    setTimeout(function() {
        jQuery('.content > .ui-accordion-content').first().addClass('firstelement');
    }, 50);
    var sCounter = jQuery('#team-container').find('.fullshortcode:last').attr('id');
    console.log(sCounter);

    jQuery("div.accordian").accordion({
    heightStyle: "content",
    collapsible: true, 
    changestart: function (event, ui) {
        if ($(event.currentTarget).hasClass("item")) {
            event.preventDefault();
            $(event.currentTarget).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        }
    });

    //    Adding Icmage

     jQuery('#team-container').on('click','.memberimage',function( event ){
     
        event.preventDefault();
     
     var parent = jQuery(this).closest('.ui-accordion-content').find('.image');
        // Create the media frame.
        la_caption_hover = wp.media.frames.la_caption_hover = wp.media({
          title: 'Add Members Image',
          button: {
            text: 'Add Image',
          },
          multiple: false  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback. 
        la_caption_hover.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var selection = la_caption_hover.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                
                parent.append('<span><img src="'+attachment.url+'"><span class="dashicons dashicons-dismiss"></span></span>');

            });  
        });
     
        // Finally, open the modal 
        la_caption_hover.open();
    });
    
    // Removing Uploades Image


    jQuery('#team-container').on('click', '.dashicons-dismiss', function() {
            jQuery(this).parent('span').remove();
    }); 

    // Cloning Add More Images 

    jQuery('#team-container').on('click', '.moreimg', function() { 
            jQuery(this).closest('.content').find('h3:last').css({
                'background': '',
                'color': ''
            });
            var parent = jQuery(this).closest('.content');
            var heading = jQuery(this).closest('.content').find('h3:first').clone(true).text('New Member').css({
                'background': '#0073aa',
                'color': 'White'
            });
            var content = jQuery(this).closest('.content').find('h3:first').next().clone(true).removeClass('firstelement');
            jQuery(parent).append(heading).append(content);
            // jQuery(parent).append(heading);

            var colorparent = jQuery(this).closest('.content').first().find('.ui-accordion-content').first();
            var membercolor = jQuery(this).closest('.content').find('.ui-accordion-content').find('.membercolorscheme').val();

            colorparent.find('.wp-picker-container').remove();
            colorparent.find('.insert-picker:eq(0)').append('<input type="text" class="membercolorscheme" value="'+membercolor+'" />');

            jQuery('.accordian').accordion('refresh'); 
            colorparent.find('.membercolorscheme').wpColorPicker();

    });

        jQuery('#team-container').on('click', '.addcat', function() { 
            sCounter++;
            jQuery('.addcat').parents().find('#faqs-container').find('h3:first').css({
                'background': '',
                'color': ''
            });
            var parent = jQuery(this).closest('#faqs-container');
            var head = jQuery('.addcat').parents().find('#faqs-container').find('h3:first').clone(true).appendTo(parent).text('New Team').css({
                'background': '#37cee5',
                'color': '#fff'
            });
            var content = jQuery('.addcat').parents().find('#faqs-container').find('h3:first').next().clone(true).removeClass('firstelement').appendTo(parent);
            

            jQuery("div.accordian").accordion({
            heightStyle: "content",
            collapsible: true, 
            changestart: function (event, ui) {
                if ($(event.currentTarget).hasClass("item")) {
                    event.preventDefault();
                    $(event.currentTarget).removeClass("ui-corner-top").addClass("ui-corner-all");
                    }
                }
            });

            var colorappend = jQuery('.addcat').parents().find('#faqs-container').find('.accordian:last').find('.ui-accordion-content');
            
            var membercolor = jQuery(this).closest('.content').find('.ui-accordion-content').find('.membercolorscheme').val();

            colorappend.find('.wp-picker-container').remove();
            colorappend.find('.insert-picker:eq(0)').append('<input type="text" class="membercolorscheme" value="'+membercolor+'" />');

            colorappend.find('.membercolorscheme').wpColorPicker();
            content.find('button.fullshortcode').attr('id', sCounter);
            jQuery('.accordian').accordion('refresh');

    });

    // Removing Category
        jQuery('#team-container').on('click', '.removecat', function(event) {

          if (jQuery(this).closest('#faqs-container > .ui-accordion-content').hasClass('firstelement')) {
                alert('You can not delete it as it is first element!');
            } else {
                
                var head = jQuery(this).closest('#faqs-container > .ui-accordion-content').prev();
                var body = jQuery(this).closest('#faqs-container > .ui-accordion-content');
                head.remove();
                body.remove();
                jQuery("#accordion").accordion('refresh');
            }  
        });

    // Removing Add More Images

    jQuery('#team-container').on('click','.removeitem',function() {

            if (jQuery(this).closest('.ui-accordion-content').hasClass('firstelement')) {
                alert('You can not delete it as it is first element!');
            } else {

                var head = jQuery(this).closest('.ui-accordion-content').prev();
                var body = jQuery(this).closest('.ui-accordion-content');
                head.remove();
                body.remove();
                jQuery("#accordion").accordion('refresh');
            }

            
    });
    jQuery('.membercolorscheme,.desc-color,.capbgcolor').wpColorPicker(); 

    jQuery('#team-container').on('click', '.save-meta', function(event) {
        event.preventDefault();     
         jQuery('#la-saved').hide();
         jQuery('#la-loader').show();
        var allmembers = []; 
          jQuery('.accordian>.content').each(function(index,val) {
            var members = {};
            members.cat_name = jQuery(this).find('.teamname').val();
            members.allteamMembers = [];
            jQuery(this).find('.ui-accordion-content').each(function(index, val) {
                var memeber = {};
                memeber.team_member_name = jQuery(this).find('.teammembername').val();
                memeber.team_name = jQuery(this).find('.teamname').val();
                memeber.member_img = jQuery(this).find('img').attr('src');
                memeber.member_name = jQuery(this).find('.membername').val();
                memeber.member_position = jQuery(this).find('.memberposition').val();
                memeber.member_link = jQuery(this).find('.memberlink').val();
                memeber.member_profile_tab = jQuery(this).find('.memberprofiletab').val();
                memeber.member_align = jQuery(this).find('.memberalign').val();
                memeber.member_style = jQuery(this).find('.memberstyle').val();
                memeber.member_grid = jQuery(this).find('.membergrid').val();
                memeber.member_color_scheme = jQuery(this).find('.membercolorscheme').val();
                memeber.member_facebook =  jQuery(this).find('.memberfacebook').val(),
                memeber.member_twitter =  jQuery(this).find('.membertwitter').val(),
                memeber.member_linkedin = jQuery(this).find('.memberlinkedin').val();
                memeber.member_google_plus = jQuery(this).find('.membergoogleplus').val();
                memeber.shortcode = jQuery(this).find('.fullshortcode').attr('id');
                memeber.counter = jQuery(this).siblings().find('.fullshortcode').attr('id'); 
                members.allteamMembers.push(memeber);
            });
            allmembers.push(members);
        });
        var data = {
            action : 'la_save_team_builder',
             allmembers : allmembers       
        }

        jQuery.post(laAjax.url, data, function(resp) {
            console.log(resp);
            // window.location.reload(true);
            jQuery('#la-loader').hide();
            jQuery('#la-saved').show();
            jQuery('#la-saved').delay(2000).fadeOut();
        });
         
    });

    jQuery('.content').on('click','button.fullshortcode',function(event) {
        event.preventDefault();
        prompt("Copy and use this Shortcode", '[wdo-team-builder id="'+jQuery(this).attr('id')+'"]');
    });

    jQuery('.enableprev').click(function() {

        jQuery(this).siblings('.preview').toggle();
    });

});
