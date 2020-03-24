// Lightweight Google Analytics tracking code
function insert_google_analytics() {
if ( !is_user_logged_in() ) {
?>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-XXXXXXXX-1']);
_gaq.push(['_setDomainName', 'YOURDOMAIN.com']);
<?php if( is_404() ){ ?>
_gaq.push(['_trackPageview', '/404/?page=' + document.location.pathname + document.location.search + '&from=' + document.referrer]);
<?php } else { ?>
_gaq.push(['_trackPageview']);
<?php } ?>
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl&#039; : 'http://www&#039;) + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<?php
}
}
add_action('wp_head', 'insert_google_analytics');