jQuery(document).ready(function()
{
   jQuery('input#search').click(function(event)
   {
       event.preventDefault();
       
       var urlForm = jQuery(this).parent().attr('action');
       var data = jQuery(this).parent().serializeArray();
       
        jQuery.ajax({
            url: urlForm,
            dataType: 'json',
            data: data,
            success: function(tweets)
            {
                jQuery('#tweets').html('<ul>');
                
                jQuery(tweets).each(function(index , value)
                {
                    jQuery('#tweets').append('<li>' + value.tweet + '</li>');
                });

                jQuery('#tweets').append('</ul>');
                jQuery('#content-right').append(jQuery('input#data').val() + '&nbsp;&nbsp;&nbsp;&nbsp');
            }
        });
   });
});