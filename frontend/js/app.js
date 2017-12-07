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
      parag = 'Infuse your life with action. Dont wait for it to happen. Make it happen. Make your own future. Make your own hope. Make your own love. And whatever your beliefs, honor your creator, not by passively waiting for grace to come down from upon high, but by doing what you can to make grace happen yourself, right now, right down here on Earth.<br>Bradley Whitford',
      paragLength = parag.length, 
      ellipsesText = "...",
      showMore = 'See more',
      showLess = 'See less';
        
  if( paragLength > myChars){
    var c = parag.substr(0 , myChars),
        h = parag.substr(myChars, paragLength - myChars),
        html = c + '<span class="ellipses">' + ellipsesText + '</span><span class="more"><span>'+  h  +' </span></span><a href="#" class="togglshow">'+ showMore  + '</a> ';
    $('.up p').html(html)
  } 
$('.togglshow').click(function() {
    if (!$(this).hasClass('showed')){
    $(this).html(showLess);
    $(this).addClass('showed');
    }else{
  $(this).removeClass('showed');
    $(this).html(showMore);
    } 
  $('.more, .ellipses, .gardient').toggle(); 
  });
    
    function load(){
        $('.timeline').fadeOut('slow')
    }  
    setTimeout(load,2000);
    
    
$('a[href="#"]').click(function() {
    return false
});
    $('.dots').click(function() {
        $('.list').fadeIn();
    });
  $('.share').click(function() {
        $('.share-li').fadeIn();
    }); 
    $(document).mouseup(function() {   
        $(".list, .share-li").hide();   
  
});
    

    $('.like').on('click mouseenter', function() {
        $('.emoji').fadeIn();
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