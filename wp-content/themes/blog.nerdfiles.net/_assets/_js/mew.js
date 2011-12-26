var DEBUG = true;

if ( ! window.localStorage ) {
  Object.defineProperty(window, "localStorage", new (function () {
    var aKeys = [], oStorage = {};
    Object.defineProperty(oStorage, "getItem", {
      value: function (sKey) { return sKey ? this[sKey] : null; },
      writable: false,
      configurable: false,
      enumerable: false
    });
    Object.defineProperty(oStorage, "key", {
      value: function (nKeyId) { return aKeys[nKeyId]; },
      writable: false,
      configurable: false,
      enumerable: false
    });
    Object.defineProperty(oStorage, "setItem", {
      value: function (sKey, sValue) {
        if(!sKey) { return; }
        document.cookie = escape(sKey) + "=" + escape(sValue) + "; path=/";
      },
      writable: false,
      configurable: false,
      enumerable: false
    });
    Object.defineProperty(oStorage, "length", {
      get: function () { return aKeys.length; },
      configurable: false,
      enumerable: false
    });
    Object.defineProperty(oStorage, "removeItem", {
      value: function (sKey) {
        if(!sKey) { return; }
        var sExpDate = new Date();
        sExpDate.setDate(sExpDate.getDate() - 1);
        document.cookie = escape(sKey) + "=; expires=" + sExpDate.toGMTString() + "; path=/";
      },
      writable: false,
      configurable: false,
      enumerable: false
    });
    this.get = function () {
      var iThisIndx;
      for (var sKey in oStorage) {
        iThisIndx = aKeys.indexOf(sKey);
        if (iThisIndx === -1) { oStorage.setItem(sKey, oStorage[sKey]); }
        else { aKeys.splice(iThisIndx, 1); }
        delete oStorage[sKey];
      }
      for (aKeys; aKeys.length > 0; aKeys.splice(0, 1)) { oStorage.removeItem(aKeys[0]); }
      for (var iCouple, iKey, iCouplId = 0, aCouples = document.cookie.split(/\s*;\s*/); iCouplId < aCouples.length; iCouplId++) {
        iCouple = aCouples[iCouplId].split(/\s*=\s*/);
        if (iCouple.length > 1) {
          oStorage[iKey = unescape(iCouple[0])] = unescape(iCouple[1]);
          aKeys.push(iKey);
        }
      }
      return oStorage;
    };
    this.configurable = false;
    this.enumerable = true;
  })());
}

$(document).ready(function() {

    $('#site-search label').attr('title', 'Search for anything you can dream of!'); 
  
    $('a[href^="#"]').bind('click.hashit', function(e) {
      
      var $this = $(this);
      
      e.preventDefault();
      
    });

    // anything!
  	
    $('#site-search label').attr('title', 'Search for anything you can dream of!');
    
    // wierd scroll-y links
    
  	$("#site-access a[href^='#'], #footer a[href^='#']").bind('click', function(e) {
  		
  		e.preventDefault();
  		
  		var $self = $(this),
      		target = this.hash,
      		$target = $(target),
      		padding = 10,
      		offset = -60;
  		
  		if ( $self.filter('a[href^="#post"]').length ) {
  		  offset = -170;
  		}
  		
      if ( $self.filter('a[href="#s"],a[href="#site-search"]').length ) {
        
        $('#s').focus();
        //return false;
        
      }
  		window.setTimeout(function() {
  		
    		window.setTimeout(function() {
          
          $('html, body').animate({
            'scrollTop': ($target.offset().top+offset)
          }, 750, 'swing', function() {
          
            if ("onhashchange" in window) {
              
              //$target.prop('id', '');
              //window.location.hash = target;
              //$target.prop('id', target.replace('#', ''));
              
            } else {
              //window.location.hash = target;
            }
            
          });
          
        }, 300);
  		  
  		}, 100);
  		
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
    
    $('#s').bind('term', function(e) {
      
      var $this = $(this);
      
      // UI design
      
      $this.attr('tabindex', '1');
      $this.attr('placeholder', 'hypertext: ctrl+enter or search: enter; e.g., "recipes", ctrl+enter')
      
      $this.bind('focus', function(e) {
        
      });
      
      //$('#s').data('tashu_store', false);
      //$('#s').val($('#s').data('tashu_store'));
      
      var __last__ = localStorage.getItem("__last__");
      
      if ( __last__ !== "false" ) {
        $('#s').val(__last__);
        //console.log(__last__);
      }
      
      localStorage.setItem("__last__", false);
      
      $this.bind('keydown keyup', function(e) {
        
        var $this = $(this),
            __ki__alt = (e.keyCode === 18) ? (e.keyCode) : false,
            __ki__s = (e.keyCode === 83) ? (e.keyCode) : false,
            __ki__ctrl = (e.keyCode === 17) ? (e.keyCode) : false,
            __ki__enter = (e.keyCode === 13) ? (e.keyCode) : false,
            tashu_store = (__ki__ctrl) ? __ki__ctrl : $('#s').data('tashu_store');
            // it's like a tissue for dom exchanges 
            
        if (e.keyCode === 9 && e.type === "keyup")
          return false;
            
        
        if ( tashu_store ) {
          console.log('tashu_store:');
          console.log(tashu_store);
        } else {
          //tashu_store = window.stash;
        }
        

        
        if ( ! __ki__enter ) {
          $('#s').data('tashu_store', $('#s').val());
        }
        
        if ( DEBUG ) {
          console.log("--key--");
          console.log(e.keyCode);
          console.log("--tash--");
          console.log(tashu_store);
          console.log("--keydowns--");
          console.log(__ki__alt);
          console.log(__ki__s);
        
        }
        
        var $site_nav = $('#site-navigation'),
            $site_admin = $('#site-admin'),
            main_pages = $.merge($site_nav.find('a'), $site_admin.find('a')),
            __with__$site_header = $.merge(main_pages, $('#site-header').find('a')),
            __with__$site_breadcrumb = $.merge(__with__$site_header, $('#site-breadcrumb').find('a')),
            __with__$home = $.merge(__with__$site_breadcrumb, $('#home').find('a')),
            __with__$hentry = $.merge(__with__$home, $('.hentry').find('a')),
            term_list = [];
         
        if ( __ki__enter && tashu_store == __ki__ctrl && $('#s').val() === "b__bies" ) {
          // for joey
          var b = [ "http://farm7.staticflickr.com/6156/6192834534_e294b91b42_b.jpg",
                    "http://deadfix.com/wp-content/uploads/2011/04/f-500x375.jpg" ];
                    
          window.location = b[Math.floor(Math.random()*b.length)];
          return false;
        }
           
        if ( e.type === "keyup" && __ki__enter && tashu_store == __ki__ctrl ) {
          // keyword list
          $.each(p = __with__$hentry, function(i, e) {
            if( $(p[i]).text() === $('#s').val() ) {
              if ( DEBUG ) {
                console.log('command: page: ' + $('#s').val());
                console.log( p.filter(':contains("about")') );
              }
              
              localStorage.setItem("__last__", $.trim($('#s').val()));
              window.location = p.filter(":contains('"+$.trim($('#s').val())+"')").attr("href");
            }
          });
        }
        
        if ( tashu_store && __ki__ctrl ) {
          
          console.log(tashu_store);
          
          // modes?
          
          // clear store
          $('#s').data('tashu_store', false);
        } else {
          // eh...
        }
        
      });
      
    });
    
    $('#s').trigger('term');
    
    if(!(navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
    	$.waypoints.settings.scrollThrottle = 30;
      
      $('#site-search').waypoint(function(event, direction) {
        $(this).toggleClass('sticky', direction === 'down');
        $('.hfeed').toggleClass('sticky');
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
