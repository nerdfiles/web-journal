$(document).ready(function() {

    $('#site-search label').attr('title', 'Search for anything you can dream of!');
    
    $('html').removeClass('no-js').addClass('js-enabled');
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
    
    $('p,ul,ol').hover(function() {
    
        var $self = $(this);
        
        console.log($self);
        
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

});
