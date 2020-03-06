// Button ID

var buttonId = '#cookie-understand';

// Cookie name

var cookieName = 'website-cookie';

// Cookie value

var cookieValue = 'website-cookie-agree';

// Cookie expire (days)

var cookieExpire = 10;

// When click button, create cookie.

$(document).ready(function(){
  $(buttonId).click(function() {
    if ($.cookie(cookieName) == null){
      // Create the cookie.
      $.cookie(cookieName, cookieValue, { expires: cookieExpire, path: '/' });
      // Hide the alert message.
      $('.cookie-bar').hide();
    }
  });
  checkCookie();
});

// If no cookie, show the cookie bar.

function checkCookie(){
    if ($.cookie(cookieName) == null) {
      // No cookie = Show cookie bar
      $('.cookie-bar').show();
    } else {
      $('.cookie-bar').hide();
    }
}