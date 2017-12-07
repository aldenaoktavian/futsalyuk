<?php include(APPPATH.'views/includes/meta-navbar.php'); ?>
<?php include(APPPATH.'views/includes/navigator.php'); ?>
   <section class="col-12">
     <div class="container profile-detail px0">
        <div class="profile-information col-12 py3 u-table">
            <div class="table-cell center align-midle col-2">
              <div class="profile-photo mx-auto">
                  <img src="<?php echo base_url().'uploadfiles/member-images/'.$data_member['member_image']; ?>" alt="">
              </div>
            </div>
            <div class="table-cell align-midle left-align col-8 px2">
              <div class="col-12">
                <h1 class="inline-block"><?php echo $data_member['member_name']; ?></h1>
                <span class="inline-block">
                  <h4>"Lets Rock"</h4>
                </span>
              </div>
              <div class="col-12 detail-information">
                <div class="col mr2">
                  <img src="<?php echo base_url(); ?>assets/img/icon-team.png" width="14px" alt="">
                  <span><?php echo $data_member['team_name']; ?></span>
                </div>
                <div class="col mr2">
                  <img src="<?php echo base_url(); ?>assets/img/activity.png" width="14px" alt="">
                  <span>350 Activity</span>
                </div>
                <div class="mr2">
                  <img src="<?php echo base_url(); ?>assets/img/friend.png" width="14px" alt="">
                  <span>345 Teman</span>
                </div>  
              </div>
            </div>
            <div class="table-cell"></div> 
        </div>
        <div class="profile-gallery col-12">
          <div class="gallery-container relative overflow-hidden col-12">
            <div class="title-gallery">
              Gallery <small>(<?php echo $count_member_gallery; ?> Photos)</small>
            </div>
            <?php foreach($member_gallery_highlight as $member_gallery){ ?>
            <div class="col col-2">
              <img src="<?php echo base_url().'uploadfiles/member-gallery/'.$member_gallery['image']; ?>" class="galery-photo" alt="">
            </div>
            <?php } ?>
            <div class="title-more">
              Lihat Semua
            </div>
          </div>
        </div> 
     </div> 
   </section>
  <section class="container mt3 nopadding">
    <div class="col md-col-2 sm-col-12 pr2">
      <div class="daily-activity u-shadow">
        <div class="col-12 px2 py1">
          <img src="<?php echo base_url(); ?>assets/img/daily.png" class="fit" alt="">
        </div>
        <div class="col-12 py1 px1 relative">
          <div class="title-respect">
            Respect to
          </div>
          <img src="<?php echo base_url(); ?>assets/img/respect.jpg" class="respect-img" alt="">
        </div>
        <div class="col-12 py1 px1 relative">
          <div class="title-respect">
            Menghadiri Acara
          </div>
          <img src="<?php echo base_url(); ?>assets/img/menghadiri.jpg" class="respect-img" alt="">
        </div>
        <div class="col-12 py1 px1 relative">
          <div class="center see-more-text">
            See Latest Activity
          </div>
        </div>
      </div>
      <div class="triangle-down">
        <img src="<?php echo base_url(); ?>assets/img/triangle-down.png" alt="">
      </div>
    </div>
    <div class="col md-col-7 sm-col-12 px2">
      <div class="timeline-profile u-shadow py2 px2">
        <div class="u-shadow">
          <div class="col-12 card px2 py2">
            <div class="status_container relative">
              <div class="profile-photo--status inline-block absolute">
                <img src="<?php echo base_url().'uploadfiles/member-images/'.$data_member['member_image']; ?>" alt="">
              </div>
              <textarea class="status-text" placeholder="tulis status anda disini..."></textarea>
            </div>
          </div>
          <div class="action-status">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Photos/Videos</span>
          </div>
        </div>

        <?php foreach($member_post_list as $post){ ?>
        <div class="u-shadow mt3">
          <div class="col-12 card px2 py2">
              <div class='up main-post'>
                <a class="dots" style="cursor: pointer;" onclick="dot_click('<?php echo md5($post['post_id']); ?>')"></a>
                <div class='list' id='list<?php echo md5($post['post_id']); ?>'>
                    <ul>
                        <li><a href='#'>Save Link</a></li>
                        <li class='seprator' role="separator"></li>
                        <li><a href='#'>Edit Post</a></li>
                        <li><a href='#'>Change Date</a></li>
                        <li><a href='#'>Embed</a></li>
                        <li><a href='#'>Turn off notification for this post</a></li>
                        <li><a href='#'>Show in tab</a></li>
                        <li class='seprator' role="separator"></li>
                        <li><a href='#'>Hide from timeline</a></li>
                        <li><a href='#'>Delete</a></li>
                        <li><a href='#'>Turn off translation</a></li>
                    </ul>
                </div>
                <div class='info'>
                    <a href="<?php echo base_url().'member/profile/'.md5($data_member['member_id']); ?>" class='avatar'>
                        <img src='<?php echo base_url().'uploadfiles/member-images/'.$data_member['member_image']; ?>' title='' /></a>
                    <a class='user' href='<?php echo base_url().'member/profile/'.md5($data_member['member_id']); ?>' target='_blank'><?php echo $post['member_name']; ?></a>
                    <span class='ca'> 
                      <a class = 'time' href='#' title="<?php echo $post['post_created']; ?>"><?php echo $post['post_created']; ?></a> 
                      <i class="fa fa-globe" title='public' aria-hidden="true"></i>
                    </span>
                </div>
                <p><?php echo $post['post_description']; ?></p>
                <!-- <div class="gardient"></div> -->
                <div class="photo-post hidden">
                  <img src="<?php echo base_url(); ?>assets/img/gale-3.jpg" alt="">
                </div>
                <div class='react'>
                    <span class="like-main"> 
                        <span class='like' onclick="show_emoji('<?php echo md5($post['post_id']); ?>')" onmouseenter="show_emoji('<?php echo md5($post['post_id']); ?>')">Like</span>
                    </span>
                    <span href='#' class='comment' title="Leave a comment">Comment</span>
                </div>
                <ul class='emoji' id="emoji<?php echo md5($post['post_id']); ?>">
                    <li class="reaction reaction-like" data-reaction="Like"></li>
                    <li class="reaction reaction-love" data-reaction="Love"></li>
                    <li class="reaction reaction-haha" data-reaction="HaHa"></li>
                    <li class="reaction reaction-wow" data-reaction="Wow"></li>
                    <li class="reaction reaction-sad" data-reaction="Sad"></li>
                    <li class="reaction reaction-angry" data-reaction="Angry"></li>
                </ul>
              </div>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>

    <div class="col md-col-3 sm-col-12 pl2">
      <div class="news-container u-shadow px2 py2">
        <div class="title-news">
          News
        </div>
        <div class="news-wrapper">
          <img src="<?php echo base_url(); ?>assets/img/gale-2.jpg" alt="">
          <div class="title-news-text">
            <p>Menurut Dokter Dunia Bermain futsal...</p>
          </div>
        </div>
        <div class="news-wrapper">
          <img src="<?php echo base_url(); ?>assets/img/gale-2.jpg" alt="">
          <div class="title-news-text">
            <p>Menurut Dokter Dunia Bermain futsal...</p>
          </div>
        </div>
        <div class="news-wrapper">
          <img src="<?php echo base_url(); ?>assets/img/gale-2.jpg" alt="">
          <div class="title-news-text">
            <p>Menurut Dokter Dunia Bermain futsal...</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    function togglshow_click(item){
      if (!$(item).hasClass('showed')){
        $(item).html('See less');
        $(item).addClass('showed');
      }else{
        $(item).removeClass('showed');
        $(item).html('See more');
      } 
      $('.more, .ellipses, .gardient').toggle();
    }

    function dot_click(id){
      $('#list' + id).fadeIn();
    }

    function show_emoji(id){
      $('#emoji' + id).fadeIn();
    }
  </script>
<?php include(APPPATH.'views/includes/footer.php'); ?>