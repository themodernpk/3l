<?php
/*
Template Name: home
*/
?>
<?php
$custom = get_post_custom();
$choose_us =ot_get_option('why_us');
$package =ot_get_option('packages');

?>
<?php 
if(is_user_logged_in()){
		get_template_part('header-dashboard');
}else{
		get_template_part('header');
}
?>

<?php //TP::css('plugins/rotating_tabs/jquery.rotate.menu'); ?>

<?php //TP::css('home'); ?>

<body class="body <?php echo body_class(); ?>">

<section class="main_bg">
	<div class="container">

		<svg id="hi-bear" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="526 -63.9 1242.3 406.3" style="enable-background:new 526 -63.9 1242.3 406.3;" xml:space="preserve">
			<style type="text/css">
				.st0{fill:none;stroke:#006A8B;stroke-width:3;stroke-miterlimit:10;}
				.st0.st_late{stroke:transparent;}
				.st1{
					opacity:1;fill:transparent;enable-background:new    ;
					transition:all 1s ease; -webkit-transition:all 1s ease;
				}
				.st2{fill:none;stroke:#006A8B;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
				.st3{fill:#0FA2BD;}
				.st4{fill:transparent;}
				.st5{fill:transparent;  transition:all 1s ease; -webkit-transition:all 1s ease;}
				.st6{fill:transparent;stroke:#006A8B;stroke-width:3;stroke-miterlimit:10;}
				.st7{    fill:none;stroke:rgba(0, 97, 129, 0.27); stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;}
				.st8{opacity:0.4;fill:none;stroke:#006A8B;stroke-width:2;stroke-miterlimit:10;}
				.st9 , .st0.my_fade , .st2.my_fade{stroke:rgba(0, 97, 129, 0.27);}
			</style>
			<path class="st0 st_late" d="M1143.9,98.3c0,0,3.1-2.7,4.8-3.2c0.6-0.2,2.4,0.3,1.5,2.7c-0.9,2.5-1.3,4.1-1.3,4.1l1.2,1.4c0,0,6-1.8,8-1.9
			c0.7,0,1.7,0.5,0.3,2.7c-1.5,2.3-4.7,5.4-4.7,5.4l1.1,3c0,0,4.2-1.3,5.7-1.5c1.2-0.2,2.8,1.1,1.3,2.7s-6.4,7.1-6.4,7.1l-0.3-7.5
			l-4.5-9.7L1143.9,98.3z"/>
			<g id="Layer_2_1_">
			</g>
			<g>
				<g id="Layer_1_1_">
					<g id="Layer_4">
					</g>
					<g id="Layer_3">
					</g>
					<g id="Layer_2">
					</g>
					<g id="Layer_5">
					</g>
					<g id="Layer_8">
					</g>
					<g id="Layer_6">
						<ellipse class="st1" cx="1315" cy="239.1" rx="16.1" ry="54.4"/>
						<path class="st1" d="M1104.4,167.7c0,0-22.5-2.6-25-22.9c-1.8-13.1-0.3-32.1,6.4-37.6c6.7-5.5,0,0,0,0s-15.3,2.2-25-9.6
						c0,0,15,45.9,15,77.3C1075.6,175.2,1102.3,171,1104.4,167.7z"/>
						<path class="st1" d="M925.7,159.6c0,0-15.8,42.7-10.9,86.1c4.9,43.4,48.1,48.4,48.1,48.4h151.4l3.3-6l-0.7-63.5
						c0,0-6.4-4.4-11.7-2.5c-2.1,0.7-5,12.4-5,14.1c-0.1,5.1,1.4,12.7-0.2,17.7c0,0-2.5,7.8-10.5,4c-8-3.8-6.1-14.3-6.1-14.3l-1.7-5
						c-0.7-2-14.2-5.1-16.2-4.5c-5.1,1.6-11.1,10.1-15.2,13.5c0,0,7.8,9.5-2.1,21.2c-5.7,6.7-14.2,7.2-21.7,3
						c-3.9-2.2-1.3-21.3-1.3-25.5c0-4.5,0-8.9,0.1-13.4c0-0.8,0.7-5.3,0-5.9l-4-3.9c0,0-8.6-1.9-9-2c-2-0.5-2,18-2,18.1
						c0.1,13.1,0.2,26.3,0.2,39.4c-12.1,0.5-24.2-0.3-36.2-2.1c-10.4-1.6-20.9-4.2-29.8-9.9c-4.7-3.1-9-7.2-10.9-12.4
						c-1.9-5.3-0.7-11.9,3.7-15.2c2.9-2.1,6.7-2.7,10.3-3.1c15.3-1.3,30.9,0.3,45.6,4.6c-1-5.9,1.7-12.1,6.7-15.3c-8,0-15.9,0-23.9,0
						c-1.6,0-3.3,0-4.7-0.6c-2.8-1.1-4.6-4.3-4.1-7.3c0.6-3,3.3-5.4,6.3-5.4c1.6,0,3.1,0.6,4.6,1c13.3,4.5,33.2,8,46.3,1.3
						c2-1,3.8-2.3,4.6-4.3c0.9-2,0.6-4.6-1.2-5.8c2.3,0.1,4.6-0.1,6.8-1.1c2.1-1,3.7-3.1,3.8-5.4c0-1.2-0.5-2.4-0.9-3.6
						c-1.8-4-7.9-9.5-11-12.6c-4.9,8-2.7,16.5-12.8,22.2c-4.6,2.7-10.5,4.1-15.9,4.1c-12.3,0.2-26.1-0.2-37.5-5.2
						c-4.6-2-8.9-5.1-13.2-7.6l-10.9-12.2l-5.5-12L925.7,159.6z"/>
						<path class="st1" d="M1020.1,84.5c0,0,12.2,22.9,41.7,20.5l-9.9-26.8C1051.9,78.3,1036.9,86.7,1020.1,84.5z"/>
						<polyline class="st2 my_fade" points="1414.8,116.4 1360.3,90.5 1274.4,130.5 			"/>
						<line class="st2 my_fade" x1="1333.8" y1="181.2" x2="1316.1" y2="167.1"/>
						<polyline class="st2 my_fade" points="1307.7,159.4 1226.7,91.8 1112.3,188.2 			"/>
						<line class="st2 my_fade" x1="922.7" y1="130.1" x2="879.6" y2="160.8"/>
						<line class="st2 my_fade" x1="1124.8" y1="206.8" x2="1096.7" y2="171"/>
						<line class="st2 my_fade" x1="871.5" y1="166.4" x2="859.6" y2="175.4"/>
						<polyline class="st0 my_fade" points="913.5,291.9 898.3,232.4 886.1,281 			"/>
						<polyline class="st0 my_fade" points="889.6,291.9 874.6,238.5 860.3,292.4 			"/>
						<polyline class="st0 my_fade" points="843.9,292.4 855.3,253.8 863.2,281.3 			"/>
						<polyline class="st0 my_fade " points="1402.4,292.8 1417.3,239.6 1431.7,293.5 			"/>
						<polyline class="st0 my_fade" points="1448,293.5 1436.7,254.9 1428.7,282.4 			"/>
						<path class="st0" d="M1379.2,232.6v-8.4c0-4.2,3.4-7.6,7.6-7.6l0,0c4.2,0,7.6,3.4,7.6,7.6v30.7c0,4.2-3.4,7.6-7.6,7.6l0,0
						c-4.2,0-7.6-3.4-7.6-7.6v-9.6"/>
						<path class="st0" d="M1378.8,245h-14.4v-10.9h14.4c3,0,5.5,2.4,5.5,5.5l0,0C1384.1,242.6,1381.7,245,1378.8,245z"/>
						<path class="st0" d="M1315,293.5h35l0,0c0.1,0,0.1,0,0.2,0c7.7,0,14-24.4,14-54.4s-6.3-54.4-14-54.4c-0.1,0-0.1,0-0.2,0l0,0h-35"
						/>
						<ellipse class="st0" cx="1315" cy="239.1" rx="16.1" ry="54.4"/>
						<path class="st2" d="M1272.3,306.9c-0.3-4.6,0-13.4,0-13.4l207.9-0.2"/>
						<polyline class="st2" points="817.6,293.5 1140.8,293.5 1140.8,307.2 			"/>
						<path class="st0" d="M1154.3,320.2L1154.3,320.2c-7.3,0-13.4-6-13.4-13.4"/>
						<path class="st0" d="M1272.3,306.8c0,7.3-5,13.4-12.4,13.4"/>
						<circle class="st0 my_fade" cx="1371.9" cy="43.2" r="24.5"/>
						<path class="st0 my_fade" d="M913.7,59.5c0-4.8-3.9-8.6-8.6-8.6c-0.8,0-1.7,0.1-2.4,0.4c-1.8-4.9-6.4-8.4-12-8.4
						c-6.3,0-11.5,4.6-12.6,10.7c-1.5-1.2-3.3-2-5.5-2c-4.8,0-8.6,3.9-8.6,8.6"/>
						<line class="st2 my_fade" x1="853.9" y1="61.2" x2="865.4" y2="61.2"/>
						<line class="st2 my_fade" x1="912.3" y1="60.4" x2="933.1" y2="60.4"/>
						<path class="st0 my_fade" d="M1326.1,82.1c0-4.6-3.7-8.3-8.3-8.3c-0.8,0-1.6,0.1-2.3,0.4c-1.7-4.6-6.1-8-11.4-8c-6,0-11.1,4.4-12,10.2
						c-1.4-1.1-3.3-1.9-5.2-1.9c-4.6,0-8.3,3.7-8.3,8.3"/>
						<line class="st2 my_fade" x1="1268.9" y1="83.7" x2="1279.9" y2="83.7"/>
						<line class="st2 my_fade" x1="1324.7" y1="82.9" x2="1336.3" y2="82.9"/>
						<path class="st0 my_fade" d="M1243.5-4.9c0-6.9-5.6-12.4-12.4-12.4c-0.9,0-1.8,0.1-2.6,0.3c-0.8-5.7-5.6-10-11.3-10.4
						c0-0.4,0.1-0.7,0.1-1c0-9-7.3-16.4-16.4-16.4c-8.6,0-15.8,6.8-16.3,15.3c-1-0.3-2-0.5-3.1-0.5c-5.6,0-10.2,4.1-11.1,9.5
						c-1.5-0.5-3.1-0.7-4.7-0.7c-8.6,0-15.6,7-15.6,15.6"/>
						<line class="st2 my_fade" x1="1125.6" y1="-5.4" x2="1151.4" y2="-5.4"/>
						<line class="st2 my_fade" x1="1242" y1="-5.4" x2="1257.6" y2="-5.4"/>
						<path class="st3" d="M921.7-1.5h-2v-2c0-0.5-0.4-0.8-0.8-0.8S918-4,918-3.6v2h-2c-0.5,0-0.8,0.4-0.8,0.8s0.4,0.8,0.8,0.8h2v2
						c0,0.5,0.4,0.8,0.8,0.8s0.8-0.4,0.8-0.8v-2h2c0.5,0,0.8-0.4,0.8-0.8S922.2-1.5,921.7-1.5z"/>
						<path class="st3" d="M906.5,224.5h-2v-2c0-0.5-0.4-0.8-0.8-0.8c-0.5,0-0.8,0.4-0.8,0.8v2h-2c-0.5,0-0.8,0.4-0.8,0.8
						s0.4,0.8,0.8,0.8h2v2c0,0.5,0.4,0.8,0.8,0.8c0.5,0,0.8-0.4,0.8-0.8v-2h2c0.5,0,0.8-0.4,0.8-0.8S907,224.5,906.5,224.5z"/>
						<path class="st3" d="M1362.8,154.7h-3.5v-3.5c0-0.8-0.7-1.5-1.5-1.5c-0.8,0-1.5,0.7-1.5,1.5v3.5h-3.5c-0.8,0-1.5,0.7-1.5,1.5
						c0,0.8,0.7,1.5,1.5,1.5h3.5v3.5c0,0.8,0.7,1.5,1.5,1.5c0.8,0,1.5-0.7,1.5-1.5v-3.5h3.5c0.8,0,1.5-0.7,1.5-1.5
						C1364.2,155.3,1363.6,154.7,1362.8,154.7z"/>
						<path class="st3" d="M1250.4,23.7h-3.5v-3.5c0-0.8-0.7-1.5-1.5-1.5s-1.5,0.7-1.5,1.5v3.5h-3.5c-0.8,0-1.5,0.7-1.5,1.5
						c0,0.8,0.7,1.5,1.5,1.5h3.5v3.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5v-3.5h3.5c0.8,0,1.5-0.7,1.5-1.5
						C1251.9,24.3,1251.3,23.7,1250.4,23.7z"/>
						<path class="st3" d="M1243.1,154.1h-2.2v-2.2c0-0.6-0.5-1-1-1c-0.6,0-1,0.5-1,1v2.2h-2.2c-0.6,0-1,0.5-1,1c0,0.6,0.5,1,1,1h2.2
						v2.2c0,0.6,0.5,1,1,1c0.6,0,1-0.5,1-1v-2.2h2.2c0.6,0,0.9-0.5,0.9-1C1244,154.5,1243.6,154.1,1243.1,154.1z"/>
						<path class="st3" d="M1268,105.3h-2.2v-2.2c0-0.6-0.5-1-1-1c-0.6,0-1,0.5-1,1v2.2h-2.2c-0.6,0-1,0.5-1,1s0.5,1,1,1h2.2v2.2
						c0,0.6,0.5,1,1,1c0.6,0,1-0.5,1-1v-2.2h2.2c0.6,0,1-0.5,1-1S1268.5,105.3,1268,105.3z"/>
						<path class="st3" d="M1445.7,38.1h-2.2v-2.2c0-0.6-0.5-1-1-1c-0.6,0-1,0.5-1,1v2.2h-2.2c-0.6,0-1,0.5-1,1c0,0.6,0.5,1,1,1h2.2
						v2.2c0,0.6,0.5,1,1,1c0.6,0,1-0.5,1-1v-2.3h2.2c0.6,0,1-0.5,1-1C1446.7,38.5,1446.3,38.1,1445.7,38.1z"/>
						<path class="st3" d="M1406.4,198.2h-1.7v-1.7c0-0.4-0.4-0.7-0.7-0.7s-0.7,0.4-0.7,0.7v1.7h-1.7c-0.4,0-0.7,0.4-0.7,0.7
						s0.4,0.7,0.7,0.7h1.7v1.7c0,0.4,0.4,0.7,0.7,0.7s0.7-0.4,0.7-0.7v-1.7h1.7c0.4,0,0.7-0.4,0.7-0.7
						C1407.1,198.7,1406.7,198.2,1406.4,198.2z"/>
						<path class="st3" d="M835.6,22.9h-1v-1c0-0.3-0.2-0.5-0.5-0.5s-0.5,0.2-0.5,0.5v1h-1c-0.3,0-0.5,0.2-0.5,0.5
						c0,0.3,0.2,0.5,0.5,0.5h1v1c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5v-1h1c0.3,0,0.5-0.2,0.5-0.5C836.1,23.1,835.8,22.9,835.6,22.9
						z"/>
						<path class="st3" d="M861.8,130.1h-1v-1c0-0.3-0.2-0.5-0.5-0.5s-0.5,0.2-0.5,0.5v1h-1c-0.3,0-0.5,0.2-0.5,0.5s0.2,0.5,0.5,0.5h1
						v1c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5v-1h1c0.3,0,0.5-0.2,0.5-0.5S861.9,130.1,861.8,130.1z"/>
						<path class="st0" d="M973.4,15.5c0,0-6.3-8.9-13.9-3.7c-7.5,5.1,0,11.6,0,11.6l-18,66.3c0,0-19.3,22.6-18.1,50.5
						c0.7,7.7,2.7,18.9-0.1,26.2s-10.1,39.1-9.2,66.9c0.9,27.9,11.8,46.5,40.4,60.2h162.7l0.7-66.2c0,0-0.9-7.4-14.4-7
						c-13.5,0.5-18.8,13.9-19.1,17.9l-18.9-4.3c0,0,11.9-9.4,10-60.9c-1.9-51.5-22.3-93.6-22.3-93.6s37.2-20.2,34.4-55.5l-53,1.3
						l-12.8-9.8c0,0-1.3-7.7-8.2-6.9c-4.6,0.6-4.5,6.9-4.5,6.9L973.4,15.5L973.4,15.5z"/>
						<path class="st0" d="M935.3,238.5c0,0,10.5-8.9,35.2-1c4.5,1,16.3,2,21.9,1c0,0,0.8-18.2,17.9-16.6c0,0,14.7-2.6,15.3,6.5v59.2
						c0,0,0.6,5.9-6,5.9"/>
						<line class="st0" x1="992.1" y1="252.3" x2="992.5" y2="238.5"/>
						<line class="st0" x1="1010.1" y1="243.6" x2="1010.9" y2="221.7"/>
						<path class="st0" d="M1047.4,248.7c0,0,16.6-11.3,20.9-19.3"/>
						<line class="st0" x1="1084.4" y1="252.3" x2="1084.5" y2="238.4"/>
						<path class="st0" d="M1110.1,220.8c0,0-8.3,0.1-8.1,9c0.2,9,0,13.8,0,13.8"/>
						<circle class="st4" cx="1023.2" cy="38.2" r="2.3"/>
						<circle class="st4" cx="983.2" cy="38.2" r="2.3"/>
						<path class="st0" d="M924.2,147.5c0,0,2.8,53.6,50.8,59.2c47.9,5.6,48.8-15.2,48.8-15.2s3.5-16.3-12.8-25.2s-30.4-22-34.2-28.2"
						/>
						<path class="st0" d="M1177.3,193.6h14.1c0,0,1.8,10.5-7.1,11.1c-8.8,0.6-7.3-11.1-7.3-11.1H1177.3z"/>
						<path class="st2" d="M1194.3,211c0,0,0,7.8-5.1,7.7s-4.9-3.7-5.1-5.7c-0.2-2,0-8.3,0-8.3"/>
						<circle class="st5" cx="1138" cy="120.9" r="9.8"/>
						<path class="st0" d="M1216.7,240.7c0,0,0.9,13.6,7.4,12.9c6.5-0.7,5.1-7.1,4-8.7C1226.9,243.3,1223.6,240.7,1216.7,240.7z"/>
						<path class="st0" d="M1173.9,230.8c0,0-0.9,13.6-7.4,12.9c-6.5-0.7-5.1-7.1-4-8.7C1163.6,233.3,1166.9,230.6,1173.9,230.8z"/>
						<path class="st0" d="M1058,90.5c0,0,6,21.1,36.2,16.2c30.2-4.9,45.7-15.3,55.2-4.2c9.6,11.2,8.7,27.7-4.9,40.1
						c-13.8,12.5-30.8,29.4-69.7,31.6"/>
						<path class="st0" d="M1054.1,78.9c0,0-18,8-33.9,5.6"/>
						<path class="st5" d="M1063.2,24.6c0,0,0.8,14.4,22.7,12.1c0,0,3.1-10.3,1.8-12.7L1063.2,24.6z"/>
						<path class="st0" d="M1063.2,24.6c0,0,0.8,14.4,22.7,12.1c0,0,3.1-10.3,1.8-12.7L1063.2,24.6z"/>
						<path class="st6" d="M1021.9,177.6l-6.2-7.9c-0.5-0.1-0.7-0.5-0.4-0.9l144.6-169c1.3-1.5,3.5-1.7,5-0.4l1.6,1.3
						c1.5,1.3,1.7,3.5,0.4,5l-144.7,171.8C1021.9,177.9,1022.1,177.6,1021.9,177.6z"/>
						<path class="st2" d="M1151.9,4.3c0,0,8.6,0.4,11.2,11.9"/>
						<path class="st2" d="M1148.3,6.5c0,0,7.6-3.9,12.6,7.5"/>
						<path class="st2" d="M1148.8,7.7c0,0,10.6,2.3,12.8,15c2.2,12.6,10.8,43.1,20.5,59c9.8,16,10.9,42.4,6,69.1
						c-4.8,26.7-4.9,39.7-4.4,44.1"/>
					</g>
					<g id="Layer_7">
					</g>
				</g>
				<g>
					<path class="st7" d="M788.3,22.9c-2,6.2-8.8,9.7-15.1,7.7c-3.1-1-5.5-3.1-7-6c-1.4-2.8-1.7-6-0.7-9.1c2-6.2,8.8-9.7,15.1-7.7
					c3.1,1,5.5,3.1,7,6C789.1,16.7,789.3,19.9,788.3,22.9z"/>
					<path class="st7" d="M785.9,20c-0.1,0.7-0.2,1.4-0.5,2"/>
					<path class="st7" d="M779.8,10.9c2.7,0.8,4.8,3,5.7,5.7"/>
					<path class="st7" d="M768.1,18.6c0.1-0.7,0.2-1.3,0.4-2"/>
					<path class="st7" d="M774.2,27.8c-2.6-0.8-4.6-2.8-5.6-5.4"/>
					<path class="st7" d="M769.6,48.8c-0.4,1-1.5,1.6-2.5,1.3c-1-0.4-1.6-1.5-1.3-2.5l4.6-14l3.7,1.2L769.6,48.8z"/>
					<path class="st7" d="M791.9,24.1c-1.3,4-4.1,7.3-7.9,9.1c-3.7,2-8,2.2-12,0.9c-4-1.3-7.3-4-9.1-7.8c-1.9-3.7-2.2-8-0.9-12
					c1.3-4,4.1-7.3,7.9-9.1c3.7-2,8-2.2,12-0.9c4,1.3,7.3,4,9.1,7.8C793,16,793.2,20.2,791.9,24.1z"/>
				</g>
				<g>
					<path class="st7" d="M695.4,276.3c-0.4,1.5-2,2.3-3.4,1.9c-1.5-0.4-2.3-2-1.9-3.4c0.4-1.5,2-2.3,3.4-1.9
					C695,273.4,695.9,274.9,695.4,276.3z"/>
					<path class="st7" d="M703.2,239.6l2-7.1"/>
					<path class="st7" d="M707.9,232.8l-9.4,32.9c-0.4,1.5-2,2.3-3.4,1.9c-1.5-0.4-2.3-2-1.9-3.4l9.4-32.9c0.4-1.5,2-2.3,3.4-1.9
					C707.4,229.8,708.2,231.4,707.9,232.8z"/>
				</g>
				<g>
					<path class="st7" d="M590.7,98.8c-1.8,0.4-3,2-2.6,3.8c0.4,1.8,2,3,3.8,2.6c1.8-0.4,3-2,2.6-3.8C594.2,99.7,592.6,98.5,590.7,98.8
					z"/>
					<path class="st7" d="M599.4,69.4c-1.1-6.4-6.2-11.3-12.6-11.9"/>
					<path class="st7" d="M583.7,57.2L583.7,57.2c-0.2,0-0.3,0.2-0.3,0.3c0,0.1,0.2,0.3,0.3,0.2l0,0l0,0c0.1,0,0.3-0.2,0.2-0.3
					C584,57.4,583.8,57.1,583.7,57.2z"/>
					<path class="st7" d="M586.5,91.8C586.5,91.8,586.5,91.8,586.5,91.8c-0.4-2.4-0.1-4.8,0.8-7.1c0.9-2.3,2.5-4.3,4.5-5.8
					c3.3-2.3,4.8-6.4,4.1-10.4c-1-5.5-6.4-9.3-11.9-8.5c-2.8,0.5-5.2,2-6.9,4.3c-1.7,2.3-2.3,5.1-1.9,7.9c0,0,0.5,2.2-0.7,3
					c-1.5,0.9-4,1-4.7-2c-0.7-4.3,0.3-8.6,2.8-12c2.5-3.4,6.1-5.7,10.3-6.4c0.1,0,0.2,0,0.2,0c4.1-0.7,8.3,0.4,11.7,2.8
					s5.8,6,6.5,10.1c0.6,2.9,0.2,6-0.9,8.8c-1.1,2.8-3,5.1-5.4,6.9c-2.2,1.7-3.4,4.4-3.2,7.2c0,0.1,0,0.1,0,0.2c0,0,0.4,2.7-0.7,3.4
					C589.7,95.5,586.9,95,586.5,91.8z"/>
				</g>
				<g>
					<path class="st7" d="M1513,33.6c-1.8,0.4-3,2-2.6,3.8c0.4,1.8,2,3,3.8,2.6c1.8-0.4,3-2,2.6-3.8C1516.5,34.6,1514.8,33.4,1513,33.6
					z"/>
					<path class="st7" d="M1521.6,4.2c-1.1-6.4-6.2-11.3-12.6-11.9"/>
					<path class="st7" d="M1506-8L1506-8c-0.2,0-0.3,0.2-0.3,0.3c0,0.1,0.2,0.3,0.3,0.2l0,0l0,0c0.1,0,0.3-0.2,0.2-0.3
					C1506.1-7.9,1506.1-8,1506-8z"/>
					<path class="st7" d="M1508.7,26.7L1508.7,26.7c-0.4-2.4-0.1-4.8,0.8-7.1c0.9-2.3,2.5-4.3,4.5-5.8c3.3-2.3,4.8-6.4,4.1-10.4
					c-1-5.5-6.4-9.3-11.9-8.5c-2.8,0.5-5.2,2-6.9,4.3c-1.7,2.3-2.3,5.1-1.9,7.9c0,0,0.5,2.2-0.7,3c-1.5,0.9-4,1-4.7-2
					c-0.7-4.3,0.3-8.6,2.8-12s6.1-5.7,10.3-6.4c0.1,0,0.2,0,0.2,0c4.1-0.7,8.3,0.4,11.7,2.8c3.4,2.4,5.8,6,6.5,10.1
					c0.6,2.9,0.2,6-0.9,8.8c-1.1,2.8-3,5.1-5.4,6.9c-2.2,1.7-3.4,4.4-3.2,7.2c0,0.1,0,0.1,0,0.2c0,0,0.4,2.7-0.7,3.4
					C1511.9,30.2,1509.2,29.9,1508.7,26.7z"/>
				</g>
				<g>
					<path class="st7" d="M1713,90.6c-2,6.2-8.8,9.7-15.1,7.7c-3.1-1-5.5-3.1-7-6c-1.4-2.8-1.7-6-0.7-9.1c2-6.2,8.8-9.7,15.1-7.7
					c3.1,1,5.5,3.1,7,6C1713.9,84.4,1714.1,87.6,1713,90.6z"/>
					<path class="st7" d="M1710.6,87.7c-0.1,0.7-0.2,1.4-0.5,2"/>
					<path class="st7" d="M1704.6,78.6c2.7,0.8,4.8,3,5.7,5.7"/>
					<path class="st7" d="M1692.9,86.3c0.1-0.7,0.2-1.3,0.4-2"/>
					<path class="st7" d="M1698.9,95.5c-2.6-0.8-4.6-2.8-5.6-5.4"/>
					<path class="st7" d="M1694.3,116.5c-0.4,1-1.5,1.6-2.5,1.3c-1-0.4-1.6-1.5-1.3-2.5l4.6-14l3.7,1.2L1694.3,116.5z"/>
					<path class="st7" d="M1716.7,91.8c-1.3,4-4.1,7.3-7.9,9.1c-3.7,2-8,2.2-12,0.9c-4-1.3-7.3-4-9.1-7.8c-1.9-3.7-2.2-8-0.9-12
					c1.3-4,4.1-7.3,7.9-9.1c3.7-2,8-2.2,12-0.9c4,1.3,7.3,4,9.1,7.8C1717.7,83.6,1718,87.9,1716.7,91.8z"/>
				</g>
				<g>
					<path class="st7" d="M1544,269.1c-0.4,1.5-2,2.3-3.4,1.9c-1.5-0.4-2.3-2-1.9-3.4c0.4-1.5,2-2.3,3.4-1.9
					C1543.6,266.1,1544.5,267.7,1544,269.1z"/>
					<path class="st7" d="M1551.8,232.3l2-7.1"/>
					<path class="st7" d="M1556.4,225.7l-9.4,32.9c-0.4,1.5-2,2.3-3.4,1.9c-1.5-0.4-2.3-2-1.9-3.4l9.4-32.9c0.4-1.5,2-2.3,3.4-1.9
					C1556,222.6,1556.8,224.1,1556.4,225.7z"/>
				</g>
			</g>
			<line class="st0" x1="1022.6" y1="15.5" x2="998.2" y2="15.5"/>
			<path class="st0" d="M1025.7,186.5c0,0-2.3-4.6-3.1-7.2c-0.2-0.6,9.6,8.7,7.7,8.7c-2.5,0-4.7,0.7-4.7,0.7l-0.6,2.3
			c0,0,3.5,2.4,4.7,3.9c0.4,0.5,1.2,2.3-1.3,2.4c-2.5,0-6.3-0.2-6.3-0.2l-2.6,3.2c0,0,0.5,0.4,2.3,1.3c1.4,0.6,2.4,1.9,0.3,2.2
			c-2,0.3-11.8,1.2-11.8,1.2l9.5-4.8l2.4-3.4l2.7-0.9l2.8,0.1l-2.6-4.3L1025.7,186.5z"/>
			<path class="st8" d="M974.3,24.1c0,0,11-5,17.3,1.8"/>
			<path class="st8" d="M1016.1,28.5c0,0,8.3-2.3,14.5,0.9"/>
			<g class="st9">
				<line class="st7" x1="960.3" y1="79.5" x2="960.3" y2="88.7"/>
				<line class="st7" x1="979.5" y1="98.8" x2="979.5" y2="108.1"/>
				<path class="st7" d="M940.3,128.6"/>
				<path class="st7" d="M946.4,118.9c0,0-1.2,7.2-4.6,10.8"/>
				<path class="st7" d="M1003.7,84.3c0,0,0.6,4.4-0.5,7.7"/>
				<path class="st7" d="M1028.6,108.1c0,0,0.5,4.2-0.9,9.1"/>
				<path class="st7" d="M1007.8,145.2c0,0,4.9-3.3,4.7-10.8"/>
				<path class="st7" d="M958.6,151.1c0,0,5.2,5.2,5.9,11.5"/>
				<path class="st7" d="M986.2,179.2c0,0,5.4,0.9,10.5,0"/>
				<path class="st7" d="M1102.9,126.3c0,0,4.2-4.5,10-5.3"/>
				<path class="st7" d="M1121,151.1c0,0,4.8-1.9,6.9-5.1c0.2-0.2,0.3-0.5,0.4-0.8"/>
				<path class="st7" d="M1090,153.4c0,0,6.3-2.4,7.1-6.8"/>
				<path class="st7" d="M1059.8,179.2c0,0-0.5-7.9,1.8-13.7"/>
				<path class="st7" d="M1063.5,209.6c0,0,0.4,7.6-3.7,11"/>
				<line class="st7" x1="1042.2" y1="209.6" x2="1044" y2="215.1"/>
				<path class="st7" d="M1040.4,240.1c0,0-1.6,4.7,0,8.1"/>
			</g>
			<path class="st0" d="M1154.2,320.2c0,0,7.2,0.5,12-3.2c4.2-3.3,9.8-5.4,17.6,0.2c7.2,5.3,14.5,1.8,18.4-1.5
			c3.4-2.8,10.7-4.1,16.6,1.7c7.2,7,14.7,1,17.5-1.9c4-4.1,12.8-3.7,16.6,1.6c4.1,4.1,9.4,2.8,9.4,2.8"/>
		</svg>

		<?php
		$heading  = $custom['wpcf-search-head'][0];
		$Search_head =	explode('-',$heading);
		?>
		<h2> <?php echo $Search_head[0];?> <span><?php echo $Search_head[1]; ?></span></h2>


		<div class="col-md-8 col-md-offset-2">
			<p class="error"></p>
			<form  role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" data-parsley-validate="" autocomplete="off" data-parsley-validate="">
				<div class="input-group nav_search">
					<input type="text" class="form-control search_input" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="I want help with (eg.Physics)" required="">
				<span class="input-group-btn">
					<button class="btn btn-default btn_search" type="submit">Find a Tutor</button>
				</span></div>
			</form>

		</div>
		<!-- </div> -->

</section>



<section class="ready_to_tutor">

	<div class="container pos-rel">

		<h2><?php echo $custom['wpcf-tutor-head'][0]; ?></h2>
		<p><?php echo $custom['wpcf-tutor_content'][0]; ?></p>

		<?php
		$args = array(
			'post_type'        => 'teacher',
			'post_status'      => 'publish',
			'posts_per_page'   => -1
		);
		$posts = get_posts( $args );
		?>

		<div id="sync1" class="owl-carousel ready_tutor_owl" >
			<?php foreach ($posts as $post) {
				?>

				<div class="item">
					<div class="main_cont">
						<div class="col-md-6 tutor_info pos-rel">
							<!-- <div id="myprogessbar"></div> -->
							<?php
                                        $args_total = array(
                                            'posts_per_page' => -1,
                                            'orderby' => 'post_date',
                                            'order' => 'ASC',
                                            'post_type' => 'rate-review',
                                            'post_status' => 'publish',
                                            'meta_key' => 'wpcf-teacher-post-id',
                                            'meta_value' => $post->ID,
                                        );
                                        $all_item_posts = new WP_Query($args_total);

                                        $total_post = $all_item_posts->post_count;

                                        if (!empty($all_item_posts)) {
                                            foreach ($all_item_posts->posts as $value) {
                                                $meta = get_post_meta($value->ID);

                                                $teacher_average_rating[] = $meta['wpcf-teacher-rating'][0];
                                            }
                                        }
                                        $rating_sum = 0;
                                        if (!empty($teacher_average_rating)) {
                                            foreach ($teacher_average_rating as $ratings) {
                                                $rating_sum = $rating_sum + $ratings;
                                            }
                                        }
                                        if (!empty($total_post)) {
                                            $average_rating_teacher = round($rating_sum / $total_post, 2);
                                        }
                                        ?>
							<div class="radial-progress <?php
                                            if ($average_rating_teacher >= 7.50) {
                                                echo "best";
                                            } elseif ($average_rating_teacher >= 5) {
                                                echo "avg";
                                            } elseif ($average_rating_teacher >= 3) {
                                                echo "poor";
                                            } else {
                                                echo "very_poor";
                                            }
                                            ?> " data-score="<?php echo $average_rating_teacher; ?>">



								<div class="circle">

									<div class="mask full">

										<div class="fill"></div>

									</div>

									<div class="mask half">

										<div class="fill"></div>

										<div class="fill fix"></div>

									</div>

								</div>

								<div class="inset"><span
										class='big'><?php if (!empty($average_rating_teacher)) {
                                                            echo $average_rating_teacher;
                                                        } else {
                                                            echo "NA";
                                                        } ?></span><!--  <span class='little'>/ 5</span> --></div>

							</div>

							<div class="tutor_dp">

								<?php
								if(has_post_thumbnail()){
									echo get_the_post_thumbnail($post->ID);
								}else{ ?>
									<img src="wp-content/uploads/2016/11/user.png" alt="not found"/>
								<?php } ?>

							</div>
							<a href="<?php echo get_permalink($post->ID); ?>"><h4><?php echo $post->post_title; ?></h4></a>
							<h6><?php
								$meta = get_post_meta($post->ID);
						
								echo $meta['wpcf-subjects-tutored'][0]; ?></h6>
							<hr/>
							<p><?php echo $post->post_content; ?> </p>
							<div class="third circle" data-size="78">
								<strong></strong>
							</div>
						</div>
						<div class="col-md-6 tutor_desc">

							<h4>Qualifications</h4>
							<div class="grad_school">
								<div class="ico">
									<img src="wp-content/themes/3lemni/assets/img/uni_ico.png">
								</div>
								<p><?php
									echo $meta['wpcf-university'][0]; ?></p>
							</div>
							<div class="grad_course">
								<div class="ico">
									<img src="wp-content/themes/3lemni/assets/img/book_ico.png">
								</div>
								<p><?php $course = get_field('course');
									echo $meta['wpcf-language'][0]; ?></p>
							</div>
							<div class="clearfix"></div>
							<a href="<?php echo site_url(); ?>/book-session/?email=<?php echo $meta['wpcf-teacher-email'][0]; ?>&subject=<?php echo $meta['wpcf-subjects-tutored'][0]; ?>" class="btn btn-block">Book Session</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
		<div id="sync2" class="owl-carousel ready_tutor_owl2">
			<?php foreach ($posts as $post) {
				?>
				<div class="item "><!--  -->

					<?php
					if(has_post_thumbnail()){
						echo get_the_post_thumbnail($post->ID);
					} else{ ?>
						<img src="wp-content/uploads/2016/11/user.png" alt="not found"/>
					<?php } ?>
				</div>
			<?php } ?>
		</div>

		<div class="view_all_tutor float-right">
			<a href="<?php echo site_url(); ?>/?s=">View all</a>
		</div>



	</div>


</section>

<!-- Why Choose Us -->
<section class="why_us">
	<div class="container-fluid">
		<h2><?php echo $custom['wpcf-why-us-head'][0]; ?></h2>
		<p><?php echo $custom['wpcf-why-us-content'][0]; ?></p>


		<div class="row pos-rel">

			<div class="center_img  hidden-xs hidden-sm ">
				<img src="wp-content/themes/3lemni/assets/img/why_us.gif">
			</div>

			<?php
			$count=1;
			foreach ($choose_us as $key=>$choose) {
				if($count ==1){
					$class = "media_row1";
				}
				if($count==3){
					$class= "media_row2";
				}
				?>

				<?php if($count==1){ ?>
					<div class="<?php echo $class; ?>">
					<?php
				} ?>
				<div class="col-sm-6">
					<div class="media wow  <?php echo $choose['class']; ?>"  data-wow-duration="1s" >
						<div class="left_meida_img hidden-md visible-sm visible-xs">
							<div class="img_wrapper">
								<img src="<?php echo $choose['image']; ?>">
							</div>
						</div>
						<div class="right_meida_text">
							<?php if($count%2 == 1){ ?>

								<div class="media-left media-middle media-heading">
									<h4><?php echo $choose['title']; ?></h4>
								</div>
								<div class="media-body">
									<ul>
										<?php echo $choose['content']; ?>
									</ul>
								</div>

							<?php }else{ ?>

								<div class="media-right media-middle media-heading visible-sm visible-xs">
									<h4><?php echo $choose['title']; ?></h4>
								</div>
								<div class="media-body">
									<ul>
										<li><?php echo $choose['content']; ?></li>
									</ul>
								</div>
								<div class="media-right media-middle media-heading hidden-sm hidden-xs">
									<h4><?php echo $choose['title']; ?></h4>
								</div>

							<?php } ?>
						</div>
					</div>
				</div>
				<?php if($count==2) { ?>
					</div>
				<?php } ?>
				<?php
				$count++; } ?>


		</div>
	</div>
</section>
<!-- Why Choose Us END-->

<!-- PACKAGES -->
<section class="packages">
	<div class="container">
		<h2><?php echo $custom['wpcf-package-head'][0]; ?></h2>
		<p><?php echo $custom['wpcf-package-content'][0]; ?></p>

		<div class="pos-rel">
			<div class="owl-carousel" id="packages_owl">
				<?php foreach ($package as $packages) { ?>
					<div class="item">
						<div class="plan_li">
							<div class="plan_li_head">
								<?php
								$package_name 	= $packages['title'];
								$pack_name 		= explode('-',$package_name);

								?>

								<h4><?php echo $pack_name[0]; ?><span><?php echo $pack_name[1]; ?></span> </h4>
								<?php
								$package_price 	= $packages['price'];
								$pack_price		= explode('-',$package_price);

								?>
								<div class="price_li"><p><?php echo $pack_price[0]; ?><span><?php echo $pack_price[1]; ?>AED </span></p></div>
							</div>
							<div class="plan_li_body">
								<ul class="sub_list">
									<?php echo $packages['features']; ?>
								</ul>
								<a href="" class="book_session">Book Session</a>
							</div>
						</div>
					</div>
				<?php } ?>

			</div><!--owl-->

		</div><!--pos-rel-->



	</div><!--container-->
</section>
<!-- PACKAGES END-->

<!-- /*What people say about us*/ -->

<section class="about_us">
	<div class="container">
		<h2><?php echo $custom['wpcf-testimonial-head'][0]; ?></h2>
		<p><?php echo $custom['wpcf-testimonial-content'][0]; ?></p>

		<div class="circular_menu pos-rel">
			<?php $args=array(
				'post_type'=>'testimonial',
				'post_status'=>'publish',
				'posts_per_page'=>6
			);
			$testimonials = get_posts($args);
			?>
			<div class="testi_logo">
				<img src="<?php echo $custom['wpcf-testimonial-logo'][0]; ?>">
			</div>

			<div id="rotate-menu">
				<?php  foreach ($testimonials as $testimonial) { ?>

					<a class="">
						<div class="hovicon effect-8">
							<?php echo get_the_post_thumbnail($testimonial->ID); ?>
						</div>
					</a>

				<?php  } ?>
			</div>

			<div class="col-md-5 testi_content">
				<?php
				foreach ($testimonials as $testimonial) {
					?>
					<div>
						<div class="test_item">
							<div class="quote"></div>
							<p><?php echo $testimonial->post_content; ?></p>
							<h6><?php echo $testimonial->post_title; ?><span><?php $country = get_post_meta($testimonial->ID); echo $country['wpcf-country'][0]; ?></span></h6>
						</div>
					</div>
				<?php  } ?>
				<!-- 1 -->
				<!-- 6 -->

			</div>
		</div>
	</div>
</section>
<!-- /*What people say about us END*/ -->

<!--  	Join our Community? -->
<?php get_template_part('inc/community'); ?>
<!--  	Join our Community?  END   -->

<!--  	Stay Updated With Us  END-->

<?php get_footer(); ?>
<?php TP::js('plugins/rotating_tabs/jquery.rotate.menu'); ?>
<?php TP::js('plugins/progressbar/circle-progress'); ?>
<?php TP::js('home'); ?>
<?php TP::js('testing_edgePreload'); ?>

<?php wp_footer(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.btn_search').click(function(){
			var value = $('.search_input').val().length;
			if(empty(value)){
				e.preventDefault();
				$('.error').text('Please Enter Subject to Search');
			}
		})
	});
</script>
<?php get_template_part('inc/document_end'); ?>