<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>

<div class="visual_slider">
    <div class="main-carousel owl-carousel">
        <div class="li" style="background-image:url('<?=G5_THEME_URL?>/img/main_banner_img01.jpg')">

            <div class="copy_area">
                <h2>TITLE TEXT</h2>
                <h3>Seb text here logo in the introduction of duty.</h3>
            </div>
      
        </div>
        <div class="li" style="background-image:url('<?=G5_THEME_URL?>/img/main_banner_img02.jpg')">
            <div class="copy_area">
                <h2>TITLE TEXT</h2>
                <h3>Seb text here logo in the introduction of duty.</h3>
            </div>
        </div>
        <div class="li" style="background-image:url('<?=G5_THEME_URL?>/img/main_banner_img03.jpg')">
            <div class="copy_area">
                <h2>TITLE TEXT</h2>
                <h3>Seb text here logo in the introduction of duty.</h3>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$('.main-carousel').owlCarousel({
		items:1,//보여줄 이미지 갯수
		nav:true,
		loop: true,
		autoplay:true,
        autoplayTimeout:3000,
		navText: ["PREV","NEXT"]
	});
});
</script> 

<section class="middle_content_warp">
    <div class="inner">
        <h2>JOB POSTING</h2>
        <ul class="clearfix">
            <li>
                <div class="thumb thumb01"></div>
                <span>Career</span>
                <h2>ACCOUNTING TEAM</h2>
                <p>2015.11.10 ~ 2015.11.30</p>
                <h3>D-day 10</h3>
                <button class="btn"><a href="<?=G5_THEME_URL?>/html/company.php">read more</a></button>
            </li>
            <li>
                <div class="thumb thumb02"></div>
                <span>Newcomer</span>
                <h2>SECRETARY TEAM</h2>
                <p>2015.11.05 ~ 2015.11.18</p>
                <h3>D-day 5</h3>
                <button class="btn"><a href="<?=G5_THEME_URL?>/html/company.php">read more</a></button>
            </li>
            <li>
                <div class="thumb thumb03"></div> 
                <span>Career</span>
                <h2>PLANNING TEAM</h2>
                <p>2015.11.02 ~ 2015.11.17</p>
                <h3>D-day 9</h3>
                <button class="btn"><a href="<?=G5_THEME_URL?>/html/company.php">read more</a></button>
            </li>
            <li>
                <div class="thumb thumb04"></div>
                <span>Career</span>
                <h2>COLOR DESIGN TEAM</h2>
                <p>2015.11.01 ~ 2015.11.07</p>
                <h3>D-day 2</h3>
                <button class="btn"><a href="<?=G5_THEME_URL?>/html/company.php">read more</a></button>
            </li>
        </ul>
    </div>
</section>
<section class="center_banner_warp">
    <div class="inner clearfix">
        <h2>COMPANY ABOUT</h2>
        <p>Seb text here logo in the introduction of duty.</p>
    </div>
</section>
<section class="company_services_warp">
    <h2>COMPANY SERVICES</h2>
    <div class="inner clearfix"> 
        <!--dl-->
        <dl class="first">
            <dt class="icon01">Pass tips</dt>
            <dd>Careers at any time through adoption sparks
                whenever a job in human resources neededvMeeting
                with volunteers in more diverse routes due to
                operational, The bonds will reduce
                the time and cost of waiting.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
        
        <!--dl-->
        <dl>
            <dt class="icon02">Introduction of duty</dt>
            <dd>Many affiliates with a variety of duties that
                may unfold a dream. Through a simple question
                and we recommend the affiliates of Hanwha job fits
                my inclinations and strengths. Check out our affiliates
                and duties that can spread the flame in your heart.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
        
        <!--dl-->
        <dl>
            <dt class="icon03">Recruitment process</dt>
            <dd>Careers at any time through adoption sparks
                whenever a job in human resources neededvMeeting
                with volunteers in more diverse routes due to
                operational, The bonds will reduce
                the time and cost of waiting.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
        
        <!--dl-->
        <dl class="first">
            <dt class="icon04">Main value</dt>
            <dd>Careers at any time through adoption sparks
                whenever a job in human resources neededvMeeting
                with volunteers in more diverse routes due to
                operational, The bonds will reduce
                the time and cost of waiting.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
        
        <!--dl-->
        <dl>
            <dt class="icon05">Global world</dt>
            <dd>Many affiliates with a variety of duties that
                may unfold a dream. Through a simple question
                and we recommend the affiliates of Hanwha job fits
                my inclinations and strengths. Check out our affiliates
                and duties that can spread the flame in your heart.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
        
        <!--dl-->
        <dl>
            <dt class="icon06">Advice</dt>
            <dd>Careers at any time through adoption sparks
                whenever a job in human resources neededvMeeting
                with volunteers in more diverse routes due to
                operational, The bonds will reduce
                the time and cost of waiting.</dd>
            <dd><img src="<?=G5_THEME_URL?>/img/btn.png" /></dd>
        </dl>
        <!--//dl--> 
    </div>
</section>
<section class="bottom_contact_wrap">
    <form id="contact-form" name="contact-form" method="post" action="<?php echo G5_THEME_URL.'/html/contact_mail_x.php' ?>" class="inner clearfix">
        <h2>CONTACT US</h2>
        <div class="left_box">
            <div class="input_page">
                <input type="text" name="co_name" id="co_name" maxlength="50" value="Your name" onfocus="if (this.value == 'Your name') this.value = '';" onblur="if (this.value == '') this.value = 'Your name';">
            </div>
            <div class="input_page">
                <input type="text" name="co_email" id="co_email" maxlength="100" value="Your email" onfocus="if (this.value == 'Your email') this.value = '';" onblur="if (this.value == '') this.value = 'Your email';">
            </div>
            <div class="input_page">
                <textarea name="co_message" id="co_message" value="Your message" onfocus="if (this.value == 'Your message') this.value = '';" onblur="if (this.value == '') this.value = 'Your message';"></textarea>
            </div>
            
            
        </div>
        
        <div class="right_box">
            <ul>
                <li><strong>Address</strong><br />
                    145-28 Gwangan-dong, Suyeong-gu, Busan</li>
                <li><strong>Call us</strong><br />
                    +82 051 - 325 - 6700</li>
                <li><strong>Email</strong><br />
                    swing1984@naver.com</li>
                <button type="submit" class="send">Send Message</button>
            </ul>
        </div>
        <div id="x_message" class="x-msg1" style="overflow: hidden; display: none;"></div>
        <div id="x_loading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></div>
    </form>
</section>
<script>
    $(function() {
			function validateEmail(email) {
					var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					return re.test(email);
			}
			function x_message(msg, type) {
				$('#x_message').html(msg).removeClass("x-msg1").removeClass("x-msg2").addClass("x-msg"+type).show(400);
				setTimeout(function() {
					$('#x_message').hide(400);
				},3000);
				
			}
			var is_sending = false;

			$('#contact-form').submit(function(e) {
				e.preventDefault();
				var co_name = $('#co_name').val();
				var co_email = $('#co_email').val();
				var co_message = $('#co_message').val();
				var data = {'co_name':co_name,'co_email':co_email,'co_message':co_message};
				
				if(co_name == '') {
					x_message('이름을 입력하세요',1);
					$('#co_name').focus();
					return false;
				}
				if(co_email == '') {
					x_message('이메일을 입력하세요',1);
					$('#co_email').focus();
					return false;
				}
				if(!validateEmail(co_email)) {
					x_message('이메일 형식이 유효하지 않습니다.',1);
					$('#co_email').focus();
					return false;
				}
				
				
				if(co_message == '') {
					x_message('내용을 입력하세요',1);
					$('#co_message').focus();
					return false;
				}
				
				is_sending = true;
				$('#x_loading').show();
				
				var url = $(this).attr('action');
				$.ajax({
						method: "POST",
						type: "POST",
						url: url,
						data: data,
						dataType: "json"
				})
					.done(function(data) {
							if(data['error']) {
								x_message(data['error'],1);
							}
							else {
								x_message('메일을 전송하였습니다.',2);
								$('#contact-form')[0].reset();
								
							}
							is_sending = false;
							$('#x_loading').hide();
					});
				
				
				
				return false;			
			});
		});
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
