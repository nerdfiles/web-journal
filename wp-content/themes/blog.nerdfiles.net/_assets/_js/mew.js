$script.ready('jquery', function() {
    
$(document).ready(function() {

    $('#site-search label').attr('title', 'Search for anything you can dream of!');
    
    $('html').removeClass('no-js').addClass('js-enabled js');
    
    $('.site-name').hover(function(e) {
        $('.call-access-menu').animate({
            opacity: 1
        }, 500);
    }, function(e) {
        $('.call-access-menu').animate({
            opacity: .4
        }, 500);
    });
    
    $('a[href="#s"],a[href="#site-search"]').bind('click', function(e) {
      $('#s').focus();
    });
    
  	$.waypoints.settings.scrollThrottle = 30;
    
    $('#site-search').waypoint(function(event, direction) {
      $('.hfeed').toggleClass('sticky');
      $(this).toggleClass('sticky', direction === 'down');
      $('#site-access').toggleClass('sticky', direction === 'down');
      event.stopPropagation();
    });
    
    $(window).bind('keydown', function(e) {
        
        var code = (e.keyCode ? e.keyCode : e.which ? e.which : e.charCode),
            $siteAccess = $('#site-access');
        
        // escape key
        
        if ( code == 27 ) { 
            
            if ( $siteAccess.data('oldstate') != 'hide' ) {
                
                // animate
                
                $siteAccess.css({
                    'left': 0,
                    'position': 'relative',
                    'opacity': 1
                }).hide().slideDown();
                
                // set state when done
                
                $siteAccess.data('oldstate', 'hide');
                
            } else {
                
                // animate
                
                $siteAccess.slideUp('slow', function() {
                    
                    $(this).css({
                        'left': '-9999px',
                        'position': 'absolute',
                        'opacity': .4
                    });
                    
                });
                
                // set state when done
                
                $siteAccess.data('oldstate', 'show');
            }
            
        }
    
    });
    
    /*
    var $Dashboard = $(".admin-meta li a:contains('Site Admin')"),
        $Lout = $(".admin-meta li a:contains('Log out')"),
        $Lin = $(".admin-meta li a:contains('Log in')"),
        referrer = document.referrer;
        
    $Dashboard.attr("href", "http://blog.nerdfiles.net/wp-admin/post-new.php");
    
    $Dashboard.text("proliferate");
    $Lout.text("an exodus");
    $Lin.text("transpierce");
    */
    
    /*
    $('#content p, #content ul, #content ol').hover(function() {
    
        var $self = $(this);
        
        //console.log($self);
        
        $self.closest('div').find('p,ul,ol').delay(700).addClass('not-this');
        
        
        $self.prev().delay(700).addClass('near-this');
        $self.next().delay(700).addClass('near-this');
        
        $self.prev().prev().delay(700).addClass('near-this');
        $self.next().next().delay(700).addClass('near-this');
        
        $self.delay(750).addClass('this');
        
    }, function() {
    
        var $self = $(this);
        
        $self.closest('div').find('p,ul,ol').delay(2000).removeClass('not-this').removeClass('this');
    
    });
    */

});

});
