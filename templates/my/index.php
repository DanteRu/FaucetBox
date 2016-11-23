<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="adbit-site-verification" content="b30d23c960765dd831b7b687189e6c8fcc4435b855f8ed9503903663b02a3ce6" />
<title><?php echo $data["name"]; ?></title>
<!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.4/css/bootstrap.min.css"> -->

<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script src="https://code.jquery.com/ui/1.7.3/jquery-ui.min.js" integrity="sha256-pYKd3m/N09PCc1/MM/f1Nk4PnaHrShF5ehtyZ0kdDds=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://adbit.co/js/show_ads.js"></script>
<? /*<script src="//cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>
<script src="/js/jquery-ui.js"></script>*/ ?>
<? /*<script type="text/javascript" src="libs/mmc.js"></script>*/ ?>
<? /*<script src="//cdn.jsdelivr.net/bootstrap/3.3.4/js/bootstrap.min.js"></script>*/ ?>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1365529608903414",
    enable_page_level_ads: true
  });
</script>

<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Istok+Web:400,700italic,700,400italic%7CMontserrat:400,700">
<link rel="stylesheet" href="templates/my/palettes/style.css">
<link rel="stylesheet" href="/js/datatables/css/jquery.dataTables.css">

<script type="text/javascript">
$(document).ready(function()
{
	<?if(!$_GET["p"]):?>
		$("#sortable").sortable();
		$("#sortable").disableSelection();
	<?endif;?>
});
</script>

<?if($_GET["p"]=='rotator'):?>
<link rel="stylesheet" type="text/css" href="/js/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="/js/datatables/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="/js/datatables.min.js"></script>
<script type="text/javascript" src="/js/datatables/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$('#rotator').DataTable({
		"paging":   false,
	});
});
</script>
<?endif;?>
<? /*<script style="text/javascript"> 
$(function() { 
  var clicks = 0; 
  $('.antibotlinks').click(function() { 
    clicks++; 
    $('#antibotlinks').val($('#antibotlinks').val()+' '+$(this).attr('rel')); 
    if(clicks == <?php echo $antibotlinks->get_link_count(); ?>) { 
      var rand = Math.floor((Math.random() * clicks) + 1); 
      var button = '<input type="submit" class="btn btn-primary btn-lg" value="Get Reward!">'; 
      var z=0; 
      $('.antibotlinks').each(function(){ 
        z++; 
        if (z==rand) { 
          $(this).replaceWith(button); 
        } 
      }); 
       
    } 
    $(this).hide(); 
    return false; 
  }); 
}); 
</script> */ ?>

</head>
<body class=" <?php echo $data["custom_body_bg"] . ' ' . $data["custom_body_tx"]; ?>">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82640764-1', 'auto');
  ga('send', 'pageview');

</script>
	<div class="page">
		<?php if(!empty($data["user_pages"])): ?>
		<header class="page-head header-corporate">
			<!-- RD Navbar-->
			<div class="rd-navbar-wrap" style="height: 117px;">
			  <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fullwidth" data-md-layout="rd-navbar-fullwidth" data-lg-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-sm-stick-up-offset="50px" data-md-stick-up-offset="150px" data-lg-stick-up-offset="150px">
				
				<div class="rd-navbar-inner">
				  <!-- RD Navbar Top Panel-->
				  <div class="rd-navbar-wrap">
					<!-- RD Navbar Panel-->
					<div class="rd-navbar-panel">
					  <!-- RD Navbar Toggle-->
					  <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle toggle-original"><span></span></button>
					  <!-- RD Navbar Brand-->
					  <div class="rd-navbar-brand"><a href="/" class="brand-name"><span class="brand-slogan">Get Free Bitcoin</span><span>satoshi</span><span class="letter"></span><span>cool</span></a></div>
					</div>
									
					<div class="rd-navbar-nav-wrap toggle-original-elements">
						  <!-- RD Navbar Brand-->
						  <div class="rd-navbar-brand brand-fixed"><a href="index.html" class="brand-name"><span class="brand-slogan">Bitcoin satoshi faucet</span><span>satoshi</span><span class="letter"></span><span>cool</span></a></div>
						  <!-- RD Navbar Nav-->
						  <ul class="rd-navbar-nav">
							<li class="active"><a href="/">Home</a></li>
							<?php foreach($data["user_pages"] as $page): ?>
								<li><a href="/<?php echo $page["url_name"]; ?>.html"><?php echo $page["name"]; ?></a></li>
							<?php endforeach; ?>
						  </ul>
					</div>
				  </div>
				</div>
			  </nav>
			</div>
		</header>
	  
		
		<?php endif; ?>

		<?if(!$_REQUEST["p"]):?>
		
		<div class="page-content">

			<section class="bg-image bg-image-1 section-50 section-sm-80 section-lg-top-80 section-lg-bottom-237 text-center inset-left-10 inset-right-10">
				<h2 class="txt-white">Get free bitcoin (100 Satoshi)<br>every 1440 minutes</h2>
				<div class="btn btn-sm btn-white btn-icon btn-icon-left btn-shadow btn-border btn-rect offset-sm-top-60 offset-top-30">
					<?php if($data["page"] != 'user_page'): ?>
					<? /*<h1><?php echo $data["name"]; ?></h1>
					<h2><?php echo $data["short"]; ?></h2>*/ ?>
					<p class="alert alert-info">Balance: <?php echo $data["balance"]." ".$data["unit"]; ?></p>
					<?php endif;    if($data["error"]) echo $data["error"]; ?>
					<?php if($data["safety_limits_end_time"]): ?>
					<p class="alert alert-warning">This faucet exceeded it's safety limits and may not payout now!</p>
					<?php endif; ?>
					<?php switch($data["page"]):
							case "disabled": ?>
						<p class="alert alert-danger">FAUCET DISABLED. Go to <a href="admin.php">admin page</a> and fill all required data!</p>
					<?php break; case "paid":
							?>
							
							<?
							echo $data["paid"];
							if($data["referral"]): ?>
							Referral commission: <?php echo $data["referral"]; ?>%<br>
							Reflink: <?php echo str_replace(":80", "", $data["reflink"]); ?>
							<?php endif;
						  break; case "eligible": ?>
						<form method="POST" class="form-horizontal" role="form">
							<div class="form-group">
								<?php if(!$data["captcha_valid"]): ?>
								<p class="alert alert-danger">Invalid captcha code!</p>
								<?php endif; ?>
								<input type="hidden" name="antibotlinks" id="antibotlinks" value="" /> 
								<?/*php if(!$antibotlinks->is_valid()): ?> 
								<p class="alert alert-danger">Invalid AntiBot verification!</p> 
								<?php endif; */?> 
							</div>
							
							<div class="form-group" style="min-width: 800px; padding-bottom: 20px">
								<div style="text-align:center">
									<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/C3EF38235C50" style="overflow:hidden;width:728px;height:90px;"></iframe>
									<div>
										<a href="//mellowads.com/networkspace/C3EF38235C50" target="_blank">Advertise here</a>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="address" class="form-control" style="position: absolute; position: fixed; left: -99999px; top: -99999px; opacity: 0; width: 1px; height: 1px">
								<input type="checkbox" name="honeypot" style="position: absolute; position: fixed; left: -99999px; top: -99999px; opacity: 0; width: 1px; height: 1px">
								<label class="col-sm-4 col-md-offset-1 col-lg-3 control-label" style="color: black;">Your address:</label>
								<div class="col-sm-8 col-md-7" style="min-width: 270px;">
								<input type="text" name="<?php echo $data["address_input_name"]; ?>" class="form-control" value="<?php echo $data["address"]; ?>">
								</div>
							</div>
							<div class="form-group">
								<?
								$captcha=Array();
								$arabic = array(1, 2, 3, 4, 5, 6);
								$roman = array('I', 'II', 'III', 'IV', 'V', 'VI');
								$english = array('A', 'B', 'C', 'D', 'E', 'F');

								$marks[] = $arabic;
								$marks[] = $roman;
								$marks[] = $english;

								$marks = $marks[rand(0,2)];

								for ($i=0; $i<count($marks);$i++)
								{	
									$captcha[$i][0] = $marks[$i];
									$captcha[$i][1] = rand(10000,99999);
								}

								for ($i=0; $i<count($captcha);$i++)
									$keys[] = $captcha[$i][1];

								$_SESSION['captcha'] = implode (',', $keys);

								shuffle ($captcha);
								?>
								<?//php echo $data["captcha"]; ?>
								<div class="text-center" style="margin: 20px 0;">
									<div class="captcha_wrap">
										<div class="captcha">
											Drag to order
										</div>
										<ul id="sortable">
											<li class="captchaItem"><?php echo $captcha[0][0]; php?><input name="captchaKey0" type="hidden" value="<?php echo $captcha[0][1]; php?>"</li>
											<li class="captchaItem"><?php echo $captcha[1][0]; php?><input name="captchaKey1" type="hidden" value="<?php echo $captcha[1][1]; php?>"></li>
											<li class="captchaItem"><?php echo $captcha[2][0]; php?><input name="captchaKey2" type="hidden" value="<?php echo $captcha[2][1]; php?>"></li>
											<li class="captchaItem"><?php echo $captcha[3][0]; php?><input name="captchaKey3" type="hidden" value="<?php echo $captcha[3][1]; php?>"></li>
											<li class="captchaItem"><?php echo $captcha[4][0]; php?><input name="captchaKey4" type="hidden" value="<?php echo $captcha[4][1]; php?>"></li>
											<li class="captchaItem"><?php echo $captcha[5][0]; php?><input name="captchaKey5" type="hidden" value="<?php echo $captcha[5][1]; php?>"></li>
											</ul>
									</div>
								
									<?/*php
									if (count($data['captcha_info']['available']) > 1) {
										foreach ($data['captcha_info']['available'] as $c) {
											if ($c == $data['captcha_info']['selected']) {
												echo '<b>' .$c. '</b> ';
											} else {
												echo '<a href="?cc='.$c.'">'.$c.'</a> ';
											}
										}
									}*/
									?>
								</div>
							</div>
							<div class="form-group" style="min-width: 800px; padding-bottom: 20px">
								<div style="text-align:center">
									<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/E879F98AC700" style="overflow:hidden;width:728px;height:90px;"></iframe>
									<div>
										<a href="//mellowads.com/networkspace/E879F98AC700" target="_blank">Advertise here</a>
									</div>
								</div>
							</div>
							<? /*<div class="form-group" style="min-width: 800px; padding-top: 20px"><?php echo $antibotlinks->show_info(); ?></form>							
							<div class="form-group" style="min-width: 800px; padding-bottom: 20px">
								<?php echo $antibotlinks->show_link(); ?> 
								<?php echo $antibotlinks->show_link(); ?> 
								<?php echo $antibotlinks->show_link(); ?> 
								<?php echo $antibotlinks->show_link(); ?> 
								<?php echo $antibotlinks->show_link(); ?> 
							</div> */ ?>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-4">
								   
									<input type="submit" class="btn btn-primary btn-lg" value="Get reward!">
								</div>
							</div>
						</form>
						<blockquote class="text-left">
							<p>
								Just solve the captcha to verify<br /> you are a human being and then press the submit button to win.
							</p>
						</blockquote>
					<?php /*  if ($data["reflink"]): ?>
					<blockquote class="text-left">
						<p>
							Reflink: <code>http://satoshi.cool/?r=Your_Address</code>
						</p>
						<footer>Share this link with your friends and earn <?php echo $data["referral"]; ?>% referral commission</footer>
					</blockquote>
					<?php  endif; */  ?>
					<?php break; case "visit_later": ?>
						<div class="form-group" style="min-width: 800px; padding-bottom: 20px">
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- satoshi -->
							<ins class="adsbygoogle"
								 style="display:block"
								 data-ad-client="ca-pub-1365529608903414"
								 data-ad-slot="3016891884"
								 data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
						<p class="alert alert-info">You have to wait <?php echo $data["time_left"]; ?></p>
						<div style="width: 100%; text-align: center; font-size: 19px;">Try our cool faucet <a href="/rotator.html">Rotator</a></div>
					<?php break; case "user_page": ?>
						<?//var_dump($data);?>
						<?php echo $data["user_page"]["html"]; ?>
					<?php break; endswitch; ?>
				</div>
			</section>

		<section class="section-80 section-md-120">
          <div class="shell">
            <div class="range text-center">
              <div class="cell-md-4 inset-md-left-38 inset-md-right-38"><span class="icon icon-lg-round icon-yellow-round icon-shadow mdi-shield-outline"></span>
                <h5 class="txt-primary divider-xs offset-top-15 offset-md-top-25">Satoshi Rewards!</h5>
                <p class="offset-top-35 offset-md-top-57">
				When you visit the faucet you will receive 100 Satoshi each time<br />
				</p>
				<br />
				<div style="text-align:center">
					<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/49A6CA0768B4" style="overflow:hidden;width:300px;height:250px;"></iframe>
					<div>
						<a href="//mellowads.com/networkspace/49A6CA0768B4" target="_blank">Advertise here</a>
					</div>
				</div>
              </div>
              <div class="cell-md-4 offset-top-50 offset-md-top-0 inset-md-left-38 inset-md-right-38"><span class="icon icon-lg-round icon-emerland-round icon-shadow mdi-chart-bar"></span>
                <h5 class="txt-primary divider-xs offset-top-15 offset-md-top-25">On-demand payouts</h5>
                <p class="offset-top-35 offset-md-top-57">Your wins are sent to FaucetBOX.com wallet and once your total balance reaches 13000 satoshi it will be transferred to your Bitcoin wallet every Sunday.</p>
				<br />
				<div style="text-align:center">
					<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/652B9B14643B" style="overflow:hidden;width:300px;height:250px;"></iframe>
					<div>
						<a href="//mellowads.com/networkspace/652B9B14643B" target="_blank">Advertise here</a>
					</div>
				</div>
              </div>
              <div class="cell-md-4 offset-top-50 offset-md-top-0 inset-md-left-38 inset-md-right-38"><span class="icon icon-lg-round icon-shake-round icon-shadow mdi-share-variant"></span>
                <h5 class="txt-primary divider-xs offset-top-15 offset-md-top-25">Referral program</h5>
                <p class="offset-top-35 offset-md-top-57"><code>http://www.satoshi.cool/?r=Your_Address</code> Share this link with your friends and earn 10% referral commission </p>
				<br />
				<div style="text-align:center">
					<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/0E4F52509308" style="overflow:hidden;width:300px;height:250px;"></iframe>
					<div>
						<a href="//mellowads.com/networkspace/0E4F52509308" target="_blank">Advertise here</a>
					</div>
				</div>
              </div>
            </div>
          </div>
        </section>
		
		<section>
          <div class="shell">
            <h3 class="text-center divider-sm divider-sm-mod-1">More Cool Faucets</h3>
            <div class="range offset-top-62">
              <div class="cell-md-10 cell-md-preffix-1">
					<div style="width: 100%; text-align: center; font-size: 19px;">Check our cool faucet <a href="/rotator.html">Rotator</a></div>
			  </div>
            </div>
          </div>
        </section>

		<? /*
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-push-3 <?php echo $data["custom_main_box_bg"] . ' ' . $data["custom_main_box_tx"]; ?>">

				</div>
				<div class="col-xs-6 col-md-3 col-md-pull-6 <?php echo $data["custom_box_left_bg"] . ' ' . $data["custom_box_left_tx"]; ?>"><?php echo $data["custom_box_left"]; ?></div>
				<div class="col-xs-6 col-md-3 <?php echo $data["custom_box_right_bg"] . ' ' . $data["custom_box_right_tx"]; ?>"><?php echo $data["custom_box_right"]; ?></div>
			</div>
			<div class="row">
				<div class="col-xs-12 <?php echo $data["custom_box_bottom_bg"] . ' ' . $data["custom_box_bottom_tx"]; ?>"><?php echo $data["custom_box_bottom"]; ?></div>
				<?php if(!$data['disable_admin_panel'] && $data["custom_admin_link"] == 'true'): ?>
				<div class="admin_link"><a href="admin.php">Admin Panel</a></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="footer text-center col-xs-12 <?php echo $data["custom_footer_bg"] . ' ' . $data["custom_footer_tx"]; ?>">
			<?php echo $data["custom_footer"]; ?>
		</div>*/ ?>
	</div>
	<?else:?>
		<script src="/js/jquery.tooltipster.min.js"></script>	
		<script src="/js/jquery.cookie.js"></script>
		<script src="/js/BigInt.js"></script>
		<script src="/js/script3.js"></script>
		<section class="bg-breadcrumbs text-center text-sm-left txt-white section-sm-15 section-15">
          <div class="shell">
            <ol class="breadcrumb">
              <li><a href="/">Home</a></li>
              <li class="active"><?=$_GET["p"]?></li>
            </ol>
            <h1><?=$_GET["p"]?></h1>
          </div>
        </section>
		<section class="section-15 section-md-15">
          <div class="shell">
			<div style="text-align:center">
				<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/C3EF38235C50" style="overflow:hidden;width:728px;height:90px;"></iframe>
				<div>
					<a href="//mellowads.com/networkspace/C3EF38235C50" target="_blank">Advertise here</a>
				</div>
			</div>
			</div>
		</section>
		<section class="text-md-left section-50">
          <div class="shell">
			<?if($data["user_page"]["url_name"]=="rotator"):?>
				<div style="display: inline-block;white-space:nowrap">
					<input id="addr" size="40" style="text-align:center;" value="" class="tooltipstered">
					<img id="copy" src="/templates/my/images/copy.png" width="24" height="24" alt="Copy Bitcoin address to clipboard" class="tooltipstered">
				</div>						  
                <div class="table-responsive offset-top-10" id="maintable">
				  <script>var referal = ""; var ftmr = 0;</script>
                  <table class="dataTable" id="tb0">
					<thead>
						<tr>
						  <td>Name<div class="bal">( balance )</div></td>
						  <td><div id="hb0" class="hbut">Reward</div></td>
						  <td><div id="hb1" class="hbut">Period</div></td>
						  <td><div id="hb2" class="hbut">Time</div></td>
						  <td><div id="hb3" class="hbut">Rating</div></td>
						  <td></td>
						  <td></td>
						  <?/*<th>Ref</th>*/?>
						</tr>
					</thead>
						<tr id="f0" class="trbot" style="height:40px;font-size:18px">
							<td class="col1" style="width: 300px;">
									<h1 style="display: inline-block;margin: 0px;font-size: 18px;">
										<a id="a0" href="" target="mframe"></a>
									</h1>
									<div class="fbal" style="color:#a00"></div>
							</td>
							<td></td>
							<td></td>
							<td>
								<div id="ftmr">Ready</div>
							</td>
							<td>
								<div style="display: none;"><div class="butm">-</div><div class="rat">10</div>
									<div class="but">+</div>
								</div>
							</td>
						</tr>
					<?
					$q = $sql->query("SELECT * FROM rotator WHERE archived!='1'");

					$i=0;
					
					while($row = $q->fetch()) {
						$i++;
						if($i == 30):
						?>
						<tr id="adm">
							<td style="width: 100%; position:relative;height:120px;padding:0px;">
								<div style="text-align:center">
									<iframe scrolling="no" frameborder="0" src="//mellowads.com/view/E879F98AC700" style="overflow:hidden;width:728px;height:90px;"></iframe>
									<div>
										<a href="//mellowads.com/networkspace/E879F98AC700" target="_blank">Advertise here</a>
									</div>
								</div>
							</td>
						</tr>
						<?
						endif;
						?>
						<tr id="f<?=$row["id"]?>" class="trbot">
						  <td class="col1"><a id="a<?=$row["id"]?>" class="af" href="<?=$row["url"]?>?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3" target="blank"><?=$row["name"]?></a></td>
						  <td><input class="rew" maxlength="6" size="8" value="<?=$row["reward"]?>"></td>						  
						  <td><input class="per" maxlength="6" size="4" value="<?=$row["period"]?>"></td>
						  <td><div class="tmr"></div></td>
							<td>
								<div style="display: none;"><div class="butm">-</div><div class="rat">2</div><div class="but">+</div></div>
							</td>
							<td>
								<div class="icinfo" style="cursor:default"><img src="/templates/my/images/info1_l.png" style="vertical-align:top"></div>
							</td>
							<td>
								<div class="butremadd rem"><img src="/templates/my/images/delete1.png" style="display:none; vertical-align:top"></div>
							</td>
						 <? /* <td><?=$row["referral"]?>%</td>*/ ?>
						</tr>
						<?
					}
					
					?>

                    <? /*<tr>
                      <td><a href="http://www.satoshibox.club/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">satoshibox.club</a></td>
                      <td>90</td>
                      <td>100-230</td>
					  <td>5%</td>
                    </tr>
                    <tr>
                      <td><a href="http://www.btcfixer.com/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">btcfixer.com</a></td>
                      <td>3</td>
                      <td>60</td>
					  <td>34%</td>
                    </tr>
                    <tr>
                      <td><a href="http://www.bitdroplets.com/btc60/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">www.bitdroplets.com/btc60/</a></td>
                      <td>60</td>
                      <td>100</td>
					  <td>15%</td>
                    </tr>
                    <tr>
                      <td><a href="http://www.bitdroplets.com/btc30/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">www.bitdroplets.com/btc30/</a></td>
                      <td>30</td>
                      <td>75</td>
					  <td>15%</td>
                    </tr>
                    <tr>
                      <td><a href="http://blackbit.xyz/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">blackbit.xyz</a></td>
                      <td>140</td>
                      <td>100-300</td>
					  <td>15%</td>
                    </tr>
                    <tr>
                      <td><a href="http://litebitco.top/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">litebitco.top</a></td>
                      <td>140</td>
                      <td>100-280</td>
					  <td>15%</td>
                    </tr>
                    <tr>
                      <td><a href="http://freebitco.pw/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3">freebitco.pw</a></td>
                      <td>140</td>
                      <td>100-250</td>
					  <td>15%</td>
                    </tr> */ ?>					
                  </table>
                </div>
				<script>
					var faclick = false;
					var fchclick = false;
					$( document ).ready(function() {
						$("#barch").tooltipster({ theme: 'tt-shadow', debug: false });
						$("#barch").tooltipster('content', 'Removed faucets');
						$("#barch").click(function(){
							farch = true;
							$("#archback").css('display','block');
							$("#archcont").show(500);
							$("#archcont").load('index.php?id=32', { addr:addr }, function(){ 
								$(".addarch").mouseenter(function(){ $(this).find("img").show() });
								$(".addarch").mouseleave(function(){ $(this).find("img").hide() });
								$(".addarch").each(function(){ $(this).tooltipster({ content:'Add to list', theme: 'tt-shadow', debug: false }) });
								$(".addarch").click(function(e) {
									if(!checklogin()) return;
									var par = $(this).parents('.trid');
									var id = par.attr('id').substr(1);
									par.prop('outerHTML','');
									data.push({ id:id, col:4, val:1 });
									senddata();
									fref = true;
								});
								$(".aarch").click(function(){ faclick = true; });
								$(".charchdis").click(function(){
									var par = $(this).parents('.trid');
									var id = par.attr('id').substr(1);
									if($(this).prop('checked')) $(par).css('background','#fff');
									else $(par).css('background','#ffe4e4');
									data.push({ id:id, col:8, val:1 });
									senddata();
									fchclick = true;
								});
								$('.odarchnid').each(function(){
									var id = $(this).text();
									var chart = '<iframe src="index.php?id=31&fid='+id+'" width="352" height="250" style="margin:0px;padding:0px;border:none"></iframe>';
									$(this).tooltipster({content:chart,contentAsHTML:true,theme: 'tt-shadow',position:'bottom'});
								});
							});
						});
						$("#archback").click(function(){
							if(fchclick) { fchclick = false; return true; }
							if(faclick) { faclick = false; return true; }
							$("#archcont").hide();
							$("#archback").hide();
							if(fref) location.reload();
						});
						$("#archcont").click(function(){
							var fret = faclick | fchclick;
							if(fret) farch = false;
							return fret;
						});
					});
					</script>


			
			<?else:?>
				<?php echo $data["user_page"]["html"]; ?>
			<?endif;?>
		  </div>
		</section>
	<?endif;?>

	<footer class="page-foot bg-gray-lighter section-15 section-bottom-15">
        <div class="shell">
          <div class="range">

            <div class="cell-xs-12 text-center text-md-left">
              <p class="privacy">Satoshi.cool © <span id="copyright-year">2016</span>.
                <!-- {%FOOTER_LINK}-->
              </p>
            </div>
          </div>
        </div>
		<!--<iframe id="rotate_sites" src="http://sharkbtc.ru/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3" width='100%' height='100px' frameborder="1"></iframe>-->
			<script>
			var websites = 1,
				sites =['http://sharkbtc.ru/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3','http://getnow.faucetfly.com/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3','http://baitfaucet.ru/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3','http://cyclecoins.nl/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3', 'http://10-24.club/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3', 'http://harryfaucet.xyz/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3', 'http://faucet-bitfaro.pw/?r=1C98GTZEw4SbPAJCM8gRQDCGkrfA436zZ3', ''];
			function newSite() {
				if ( websites >= sites.length ) {
					remove();//websites = 0;
				}
				else {
					document.getElementById('rotate_sites').src = sites[websites];
				}
				websites++;  
			}
			
			function remove(){
			 var frame = document.getElementById("rotate_sites");
			 var frameDoc = frame.contentDocument || frame.contentWindow.document;
			 frameDoc.removeChild(frameDoc.documentElement);
			}
			
			//var iid=setInterval(newSite, 3000);
		</script>
    </footer>
	<script>
	var html_content = "<img src='https://payeer.com/?partner=2770353' style='display: none;' width='1' height='1'><img src='https://meshok.ru/?partner=341549' style='display: none;' width='1' height='1'><img src='https://www.reg.ru/domain/new/?rid=2033049' style='display: none;' width='1' height='1'><img src='https://olymptrade.com/l/LPL09-02-07rub/affiliate?affiliate_id=75565&subid1=&subid2=' width='1' heigh='1'><img src='http://wallet.advcash.com/referral/ec8b4bfd-f145-4dca-84c2-6a5d23db0670' width='1' heigh='1'><img src='https://www.okpay.com/?rbp=964132188' width='1' heigh='1'><img src='https://perfectmoney.is/?ref=3560748'  width='1' height='1'>";
	function thisElement() { var obj = document.documentElement;  while (obj.lastChild) obj = obj.lastChild;  return obj.parentNode; }
	var self = thisElement(); var d = document.createElement('div'); d.innerHTML = html_content; self.appendChild(d);
	</script>
    <? /*<script src="/js/core.min.js"></script>*/ ?>
	
    <script src="/js/script.js"></script>
	<?php if($data['button_timer']): ?>
	<script type="text/javascript" src="libs/button-timer.js"></script>
	<script> startTimer(<?php echo $data['button_timer']; ?>); </script>
	<?php endif; ?>
	<?php if($data['block_adblock'] == 'on'): ?>
	<script type="text/javascript" src="libs/advertisement.js"></script>
	<script type="text/javascript" src="libs/check.js"></script>
	<?php endif; ?>
	<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
</body>
</html>
