$(document).ready(function(){
    if (localStorage.getItem('cookieNotice') == null) {
        $('body').prepend('<div class="cookie-notice"><div class="message">Este site utiliza cookies para garantir a melhor experiência em nosso site. Ao continuar navegando, você concorda com o uso de cookies.</div><a href="#" class="button" id="accept-cookies">OK</a></div>');
    }
    
    $('#accept-cookies').click(function(){
        localStorage.setItem('cookieNotice', 'true');
        $('.cookie-notice').fadeOut();
        return false;
    });
});
