<section class="sub_navI_warp">
    <div class="all-wrap">
        <div class="loca-wrap">
            <div class="loca-area"><i class="home"><a href="/"><img src="<?=G5_THEME_URL?>/img/home_btn.png" alt=""></a></i>
                <ul>
                    <li>
                        <?php
					$lm = substr($hb_me_code,0,2);
					?>
                        <button type="button"><span>
                        <?=$MENUM[$lm]['me_name']?>
                        </span></button>
                        <div class="next-depth">
                            <ul>
                                <?php foreach ($MENUM as $k=>$menu) { ?>
                                <li><a href="<?=$menu['me_link']?>" >
                                    <?=$menu['me_name']?>
                                    </a>
                                    <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php if(count($MENUM[$lm]['ms']) > 0) { ?>
                    <li style="background-color:#333">
                        <button type="button"><span>
                        <?=$MENUM[$lm]['ms'][$hb_me_code]['me_name']?>
                        </span></button>
                        <div class="next-depth">
                            <ul>
                                <?php foreach ($MENUM[$lm]['ms'] as $k=>$menu) { ?>
                                <li><a href="<?=$menu['me_link']?>" >
                                    <?=$menu['me_name']?>
                                    </a>
                                    <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            
        </div>
    </div>
</section>
<script>
var es_step = "Expo.ease";
$(function() {
	// 로케이션 바 하위뎁스 관련
    var loca_v = false;
    $(".loca-area ul li button").on("click", function(){
        var $this = $(this);
        var $li = $this.parent("li");
        var nd_height = $this.siblings("div").find("ul").height();
        if ( loca_v == false ){
            $this.addClass("active");
            TweenMax.to( $this.siblings("div"), 0.3, {height: nd_height, ease: es_step});
            loca_v = true;
        } else {
            $this.removeClass("active");
            TweenMax.to( $this.siblings("div"), 0.3, {height: 0, ease: es_step});
            loca_v = false;
        }
        $li.mouseleave(function(){
            $li.find("button").removeClass("active");
            TweenMax.to( $li.find(".next-depth"), 0.3, {height: 0, ease: es_step});
            loca_v = false;
        });
		
		$this.blur();
    })
	
	
	var share = false;
	$(".share-btn").on("click", function(){
		if (share == false){
			$(this).addClass("active");
			shareOpen();
			share = true;
		} else{
			$(this).removeClass("active");
			shareClose();
			share = false;
		}
		$(this).blur();
	})

	function dimmed(dimmedName, num, display) {
		TweenMax.to($(dimmedName), 0.3, {opacity: num, display: display, ease: es_step});
	}
	function shareOpen(){
		TweenMax.to($(".hide-area"), .3, {left:0, ease: es_step});
	}
	function shareClose(){
		TweenMax.to($(".hide-area"), .3, {left:200, ease: es_step});
	}
	
});

</script> 
<script>
$(function(){ 
    var menupos = $(".sub_navI_warp").offset().top; 
    $(window).scroll(function(){ 
       if($(window).scrollTop() >= menupos) { 
          $(".sub_navI_warp").css("position","relative"); 
          $(".sub_navI_warp").css("top","-32");
		  
       }
	   else {
	   	$(".sub_navI_warp").css("position","relative");
	   }
    }); 
 }); 
</script>