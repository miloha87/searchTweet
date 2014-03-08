function searchTwitter(query)
{
   jQuery.ajax({
       url: 'https://api.twitter.com/1.1/search/tweets.json?q=hola',
       dataType: 'json',
       success: function(data) {
           var tweets = $('#tweets');
           tweets.html('');
           for (res in data['results']) {
               tweets.append('<div>' + data['results'][res]['from_user'] + ' wrote: <p>' + data['results'][res]['text'] + '</p></div><br />');
           }
       }
   });
}

jQuery(document).ready(function()
{
   jQuery('input.search-query').blur(function()
   {
       var params = {
           q: jQuery(this).val(),
           rpp: 5
       };

       searchTwitter(params);
   });
});