var yourNavigation = $(".navigator");
    stickyDiv = "sticky-navigator";
    yourHeader = 300;

$(window).scroll(function() {
  if( $(this).scrollTop() > yourHeader ) {
    $(".navigator").addClass(stickyDiv);
    $(".profile-detail").addClass('mtSticky');
  } else {
    $(".navigator").removeClass(stickyDiv);
    $(".profile-detail").removeClass('mtSticky');
  }
});

$(function() {
  var myChars = 250,
      ellipsesText = "...",
      showMore = 'See more',
      showLess = 'See less';
    
    function load(){
        $('.timeline').fadeOut('slow')
    }  
    setTimeout(load,2000);
    
    
$('a[href="#"]').click(function() {
    return false
});
  $('.share').click(function() {
        $('.share-li').fadeIn();
    }); 
    $(document).mouseup(function() {   
        $(".list, .share-li").hide();   
  
});
    $('.main-post').on('mouseleave', function() {
        $('.emoji').delay(300).fadeOut();
    });   
    
    $('.reaction').click(function() {
        var data_reaction = $(this).attr('data-reaction');
        $('.like-details').html('You, Lamis Elhadidy and 50 others');
        
        $('.like').text(data_reaction).removeClass().addClass('like').addClass("active");;
        $('.like').addClass('like-main-' + data_reaction.toLowerCase()).addClass('holynoob');
      $('.alert-emo').html('<span class="like-btn-' + data_reaction.toLowerCase() + '"></span>'); 
        if (data_reaction == "Like")
            $(".like-emo").html('<span class="like-btn-like"></span>');
        else
            $(".like-emo").html('<span class="like-btn-like"></span><span class="like-btn-' + data_reaction.toLowerCase() + '"></span>');
      $('.notif-alert').fadeIn().delay(1500).fadeOut('slow')
        $('.emoji').delay(300).fadeOut();
    }); 
  
    $('.like').on('click', function() {
        if ($(this).hasClass('active')) {
            $('.like-details').html('Lamis Elhadidy and 50 others');
            $('.like-emo').html('<span class="like-btn-like"></span>');
            $(this).text('Like').removeClass().addClass('like');
            $('.alert-emo').html(''); 
        }
          else if  ( $(this).hasClass('like-main-like') ){
        $('.like-details').html('Lamis Elhadidy and 50 others');
            $(this).removeClass('like-main-like');
            }else{
                $('.like-details').html('You, Lamis Elhadidy and 50 others');
                $(this).addClass('like-main-like').addClass('holynoob');
            }
    });        
    $('.reaction, .like').mousedown(function(){
          $('.like').removeClass('holynoob');
    });
    
    
    $('#myTextArea').on('focus blur',function(e){
    if(e.type === 'focus'){
        $('#myTextArea').attr('placeholder', 'Hit enter when youre ready');
                $('html, body').animate({
            scrollTop: $('p').offset().top
        });
    }
    if (e.type === 'blur'){
        $('#myTextArea').attr('placeholder', 'Write a comment..');
    } 
}); 
    
    
  $('#myTextArea').on('keyup paste', function() {
  $('.animate-typing').slideDown()  
      
    var $el = $(this),
        offset = $el.innerHeight() - $el.height(),
        vl = $('#myTextArea').val();
if(vl ==''){
    $('.animate-typing').slideUp() 
}
    if ($el.innerHeight < this.scrollHeight) {
      $el.height(this.scrollHeight - offset);
      
    } else {
      $el.height(1);
      $el.height(this.scrollHeight - offset);
        
    }
  });  
    $('.close-btn ').click(function() {
        $('.notif-alert').hide()
    });
    

}); //end dsa