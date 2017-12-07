<style type="text/css">
    .form-control{
        width: 50%;
        height: 44px;
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        margin: auto;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Input Score</h3><br/>
	<hr/>
	<div style="margin-top: 35px;" id="data-challenge">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<img class="img-circle" src
    		="<?php echo base_url().'uploadfiles/team-images/'.$inviter_team_image; ?>" style="width: 100%;max-width: 100px;margin-bottom: 15px;"><br/>
    		<h4><?php echo $inviter_team_name; ?></h4><br/>
    		<input type="text" id="inviter_score" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $inviter_score; ?>">
    	</div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<br/>
    		<span class="challenge-vs">VS</span><br/><br/>
    		<p>
    			<?php echo 'Tanggal '.$challenge_date.
    						'<br/> Jam '.$challenge_time.
    						'<br/> di '.$nama_lapangan.
    						'<br/> '.$lapangan_daerah.', '.$lapangan_kota; 
    			?>
    		</p>
    	</div>
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
    		<img class="img-circle" src="<?php echo base_url().'uploadfiles/team-images/'.$rival_team_image; ?>" style="width: 100%;max-width: 100px;margin-bottom: 15px;"><br/>
    		<h4><?php echo $rival_team_name; ?></h4><br/>
    		<input type="text" id="rival_score" class="form-control" value="<?php echo $rival_score; ?>">
    	</div>
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="margin-top: 50px;">
    		<button type="button" class="btn btn-primary save_score">Save Score</button><br/><br/>
    		<span id="message" style="color:red;"></span>
    	</div>
	</div>
</div>
<script type="text/javascript">
/* start add new team member */
$('.save_score').click(function(){
	var challenge_id = '<?php echo $challenge_id; ?>';
	$.post(base_url + "challenge/input_score_save",
	{
	  challenge_id: challenge_id,
	  inviter_score: $('#inviter_score').val(),
	  rival_score: $('#rival_score').val(),
      score_update: 0
	},
	function(data,status){
		data = $.parseJSON(data);
		if(data.status == 1){
            emit_new_notif($.parseJSON(data.data_notif), $.parseJSON(data.data_count_notif));
		    $('#data-challenge').html(data.message);
		} else{
		    $('#message').html(data.message);
		}
	});
});
/* end add new team member */
</script>
<button title="Close (Esc)" type="button" class="mfp-close">×</button>