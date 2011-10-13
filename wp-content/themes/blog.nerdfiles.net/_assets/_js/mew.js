$(document).ready(function() {

    // anything!
  	
    $('#site-search label').attr('title', 'Search for anything you can dream of!');
    
    // wierd scroll-y links
    
  	$("#site-access a[href^='#'], #footer a[href^='#']").click(function(e) {
  		
  		var $self = $(this),
      		target = this.hash,
      		$target = $(target),
      		padding = 10,
      		ifContent = 100;
  		
  		if ( $self.filter('a[href^="#post"]').length && $('#site-access').hasClass('sticky') ) {
  		  ifContent = 0;
  		} else if ( $self.filter('a[href^="#comments"]').length ) {
  		  ifContent = 330;
  		}
  		
      if ( $self.filter('a[href="#s"],a[href="#site-search"]').length ) {
        
        $('#s').focus();
        //return false;
        
      }
  		
  		$('html, body').animate({
  			'scrollTop': ($target.offset().top)
  		}, 750, 'swing', function() {
  		
  		  if ("onhashchange" in window) {
  		    
  		    //$target.prop('id', '');
  		    //window.location.hash = target;
  		    //$target.prop('id', target.replace('#', ''));
  		    
  		  } else {
  		    //window.location.hash = target;
        }
        
  		});
  		
  		//e.preventDefault();
  		
  	});
    
    // hover thing-y
    
    $('.site-name').hover(function(e) {
    
      var t = setTimeout(function() {
      
        $('.call-access-menu').animate({
            opacity: 1
        }, 500);
        
      }, 200);
      
      $(this).data('timeout', t);
      
    }, function(e) {
    
      clearTimeout($(this).data('timeout'));
      
      var t = setTimeout(function() {
      
        $('.call-access-menu').animate({
            opacity: .4
        }, 500);
        
      }, 200);
      
    });
    
    // search~
    
    $('#s').bind('focus blur', function(e) {
    
      var $self = $(this),
          $siteSearch = $('#site-search');
      
      $siteSearch.animate({ opacity: 1 }, 300);
      
      if (e.type === 'blur') {
      
        $siteSearch.animate({ opacity: .4 }, 300, function() {
        
          $siteSearch.attr('style', '');
          
        });
        
      }
      
    });
    
    if(!(navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
    	$.waypoints.settings.scrollThrottle = 30;
      
      $('#site-search').waypoint(function(event, direction) {
        $('.hfeed').toggleClass('sticky');
        $(this).toggleClass('sticky', direction === 'down');
        $('#site-access').toggleClass('sticky', direction === 'down');
        event.stopPropagation();
      });
    }
    
    $('.call-access-menu').bind('click', function(e) {
      $(window).trigger('keydown.toggleAccessibility');
    });
    
    $(window).bind('keydown.toggleAccessibility', function(e) {
        
        var code = (e.keyCode ? e.keyCode : e.which ? e.which : e.charCode),
            $siteAccess = $('#site-access'),
            $siteAccessUl = $siteAccess.find('ul'),
            sticky = $siteAccess.hasClass('sticky'),
            positionValue = (sticky) ? (($siteAccess.data('oldstate') != 'hide') ? ('fixed') : ('relative')) : (($siteAccess.data('oldstate') == 'hide') ? ('absolute') : ('relative'));
        
        // escape key
        
        if ( code == 27 || code === undefined) { 
            
            if ( $siteAccess.data('oldstate') != 'hide' ) {
                
                // animate
                
                $siteAccess.removeClass('hide').addClass('show').slideDown();
                
                // set state when done
                
                $siteAccess.data('oldstate', 'hide');
                
            } else {
                
                // animate
                
                $siteAccess.slideUp('slow', function() {
                    
                    $(this).removeClass('show').addClass('hide');
                    
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
