window.fbAsyncInit = function() {
  FB.init({
    appId      : '1503263156594333',
    xfbml      : true,
    version    : 'v2.1'
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));

window.Sai = window.Sai || {};
Sai.publisher = {
    publicKey: 'ppj28h2k'
};
(function() {
    var se = document.createElement('script');
    se.type = 'text/javascript';
    se.async = true;
    se.src = 'http://cf.shareasimage.com/static/app/js/compiled/publisher.min.js';
    var lse = document.getElementsByTagName('script')[0];
    lse.parentNode.insertBefore(se, lse);
})();