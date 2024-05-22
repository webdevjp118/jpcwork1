<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artstone
 */

?>
<?php
global $g_youtube_url;
global $g_twitter_url;
global $g_facebook_url;
?>
<footer class="">
	<div class="footer_menu">
		<div class="custom_container">
			<div class="custom_row">
				<div class="footer_menu_left">
					<a href="<?php echo get_site_url(); ?>/" class="footer_logo">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo_white.png" alt="logo image">
					</a>
					<div class="footer_buttons_menu">
						<a target="_blank" href="<?php echo $g_youtube_url; ?>" class="social"><i class="fab fa-youtube"></i></a>
						<a target="_blank" href="<?php echo $g_twitter_url; ?>" class="social"><i class="fab fa-twitter"></i></a>
						<a target="_blank" href="<?php echo $g_facebook_url; ?>" class="social"><i class="fab fa-facebook"></i></a>
					</div>
				</div>
				<div class="footer_menu_right">
					<ul>
						<li>
							<a href="<?php echo get_site_url(); ?>/services/">services</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/news/">news</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/company/">company</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/recruit/">recruit</a>
						</li>
						<li>
							<a href="<?php echo get_site_url(); ?>/contact/" class="inquiry"><i class="far fa-envelope"></i>contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer_conpyright">
		<div class="custom_container">
			<p>© 2018 - 2022 ©Art Stone Entertainment Inc.</p>
		</div>
	</div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/fonts-awesome-5.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/slick.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/intersection-observer-polyfill.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/responsiveTabs.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.lettering.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>
<script>
	$(document).ready(function(){
		$(".banner_text_section .banner_title").lettering();

		$(window).on("load resize", function () {
			var textAnimation = function(obj) {
				$(arr[text_counter]).addClass("animate_zoom_out");
				text_counter++;
			};
			var arr = $(".banner_text_section .banner_title span");
			var text_counter = 0;
			var timer_counter = 1;

			setTimeout(function(){
				$(".banner_text_section .banner_title span").each(function(){
					setTimeout(function(){
						textAnimation()
					},50*timer_counter);
					timer_counter++;
				});
				$(".banner_text_section .banner_title").addClass("fill_bg")
			}, 1500);

			setTimeout(function(){
				$(".banner_text_section .banner_sub_title").addClass("animate_fade_in");
				$(".banner_text_section .banner_sub_title").addClass("fill_bg")
			}, 3500);

			setTimeout(function(){
				$(".banner_text_section .banner_sub_text").addClass("animate_fade_in");
				$(".banner_text_section .banner_sub_text").addClass("fill_bg")
			}, 4000);

			setTimeout(function(){
				$(".banner_text_section .arts_and_more").addClass("animate_fade_in");
				$(".banner_text_section .arts_and_more").addClass("fill_bg")
			}, 4500);
		});

		var wSize = $(window).width();
		var hSize = $(window).height();
		var runnerW = wSize*0.02277
		var itemW = wSize*0.03307
		var carB = wSize*0.07507
		var carL2W = wSize*0.06007
		var carW = wSize*0.06907
		var runner2W = wSize*0.02207
		var wRight04W= wSize*0.06307
		var travelR= wSize*0.02807
		var plane=wSize*0.03577
		$(".plane").width(plane);
		$(".birdleft").width(carB);
		$(".birdright").width(carB);
		$(".walkerRight01").width(runnerW);
		$(".walkerR2").width(runnerW);
		$(".walkerRight02").width(runnerW);
		$(".walkerRight03").width(runnerW);
		$(".walkerRight04").width(wRight04W);
		$(".walkerLeft01").width(runnerW);
		$(".walkerL2").width(runnerW);
		$(".walkerLeft02").width(runnerW);
		$(".walkerLeft03").width(runner2W);
		$(".walkerR3").width(runnerW);
		$(".walkerL3").width(runnerW);
		// $(".travelerL").width(runnerW);
		$(".travelerR").width(travelR);
		$(".carL01").width(carB);
		$(".carL02").width(carL2W);
		// $(".taxi_1L").width(carW);
		$(".taxi_2L").width(carW);
		$(".item08").width(itemW);
		$(".item09").width(itemW);
		$(".item10").width(itemW);

		randomPos();
		function randomPos(){
			$(".city .item08").each(function(){
				var peopleRdmPos = Math.round( Math.random()*0 );
				var peopleRdmPos69 = peopleRdmPos + 69
				$(this).css({left:peopleRdmPos69+"%"})
			});
			$(".city .item09").each(function(){
				var peopleRdmPos = Math.round( Math.random()*0 );
				var peopleRdmPos54 = peopleRdmPos + 54
				$(this).css({left:peopleRdmPos54+"%"})
			});
			$(".city .item10").each(function(){
				var peopleRdmPos = Math.round( Math.random()*0 );
				var peopleRdmPos40 = peopleRdmPos + 40
				$(this).css({left:peopleRdmPos40+"%"})
			});
		}

		//plane
		var planeRdmPos = Math.round( Math.random()*(-50) );
		var planeRdmPosDis = 100 - planeRdmPos;
		var rdmDelay = Math.round( Math.random()*400 );
		$(".city .plane").css({left:planeRdmPos+"%"});
		$(".city .plane").delay(rdmDelay+2000).animate({left:100+"%",bottom:350+"px"},planeRdmPosDis*60,"linear",function(){
			$(".city .plane").css({left:-20.384+"%" ,bottom:30+"px"});
			planeLoop();
		});
		
		function planeLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .plane").delay(rdmDelay+2000).animate({left:100+"%",bottom:350+"px"},planeRdmPosDis*60,"linear").animate({left:100+"%",bottom:0},30000,"linear",function(){
					$(".city .plane").css({left:-20.384+"%" ,bottom:30+"px"});
				});
			},100);
		}

		//birds
		var planeRdmPos = Math.round( Math.random()*(-50) );
		var planeRdmPosDis = 100 - planeRdmPos;
		var rdmDelay = Math.round( Math.random()*600 );
		$(".city .birdleft").css({left:planeRdmPos+"%"});
		$(".city .birdleft").delay(rdmDelay+2000).animate({left:100+"%",bottom: 0+"px"},planeRdmPosDis*260,"linear",function(){
			$(".city .birdleft").css({left:-20.384+"%" ,bottom:150+"px"});
			birdLoop();
		});
		
		function birdLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .birdleft").delay(rdmDelay+2000).animate({left:100+"%",bottom: 0+"px"},planeRdmPosDis*260,"linear").animate({left:100+"%",bottom:0},30000,"linear",function(){
					$(".city .birdleft").css({left:-20.384+"%" ,bottom: 150+"px"});
				});
			},100);
		}

		//birds
		var planeRdmPos = Math.round( Math.random()*(-50) );
		var planeRdmPosDis = 100 - planeRdmPos;
		var rdmDelay = Math.round( Math.random()*200 );
		$(".city .birdright").css({right:planeRdmPos+"%"});
		$(".city .birdright").delay(rdmDelay+2000).animate({right:100+"%",bottom: 0+"px"},planeRdmPosDis*260,"linear",function(){
			$(".city .birdright").css({right:-20.384+"%" ,bottom:150+"px"});
			birdLoop();
		});
		
		function birdLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .birdright").delay(rdmDelay+2000).animate({right:100+"%",bottom: 0+"px"},planeRdmPosDis*260,"linear").animate({right:100+"%",bottom:0},30000,"linear",function(){
					$(".city .birdright").css({right:-20.384+"%" ,bottom: 150+"px"});
				});
			},100);
		}
		
		//walkerLeft
		//walkerLeft01
		var walkerLeftRdmPos = Math.round( Math.random()*50 );
		var walkerLeftRdmPosDis = 100 - walkerLeftRdmPos
		$(".city .walkerLeft01").css({left:walkerLeftRdmPos+"%"});
		$(".city .walkerLeft01").animate({left:100+"%",bottom:0},walkerLeftRdmPosDis*420,"linear",function(){
			$(".city .walkerLeft01").css({left:-1.384+"%"});
			walkerLeftLoop();
		});
		
		function walkerLeftLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerLeft01").delay(rdmDelay+100).animate({left:50+"%",bottom:0+"%"},30000,"linear").animate({left:100+"%",bottom:0},30000,"linear",function(){
					$(".city .walkerLeft01").css({left:-3.384+"%"});
				});
			},100);
		}
		
		//walkerL2
		var walkerLeftRdmPos = Math.round( Math.random()*50 );
		var walkerLeftRdmPosDis = 100 - walkerLeftRdmPos
		$(".city .walkerL2").css({left:walkerLeftRdmPos+"%"});
		$(".city .walkerL2").animate({left:100+"%",bottom:0},walkerLeftRdmPosDis*420,"linear",function(){
			$(".city .walkerL2").css({left:-1.384+"%"});
			walkerL2Loop();
		});
		
		function walkerL2Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*4000 );
				$(".city .walkerL2").delay(rdmDelay+100).animate({left:50+"%",bottom:0+"%"},30000,"linear").animate({left:100+"%",bottom:0},30000,"linear",function(){
					$(".city .walkerL2").css({left:-3.384+"%"});
				});
			},100);
		}

		//walkerLeft02
		var walkerLeftRdmPos = Math.round( Math.random()*50 );
		var walkerLeftRdmPosDis = 100 - walkerLeftRdmPos
		$(".city .walkerLeft02").css({left:walkerLeftRdmPos+"%"});
		$(".city .walkerLeft02").animate({left:100+"%",bottom:0},walkerLeftRdmPosDis*260,"linear",function(){
			$(".city .walkerLeft02").css({left:-3.384+"%"});
			walkerLeft02Loop();
		});
		
		function walkerLeft02Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerLeft02").delay(rdmDelay+9000).animate({left:100+"%",bottom:0+"%"},9000*3,"linear").animate({left:100+"%",bottom:0},9000,"linear",function(){
					$(".city .walkerLeft02").css({left:-3.384+"%"});
				});
			},100);
		}
		
		//walkerLeft03
		var walkerLeftRdmPos = Math.round( Math.random()*70 );
		var walkerLeftRdmPosDis = 100 - walkerLeftRdmPos
		$(".city .walkerLeft03").css({left:walkerLeftRdmPos+"%"});
		$(".city .walkerLeft03").animate({left:100+"%",bottom:0},walkerLeftRdmPosDis*460,"linear",function(){
			$(".city .walkerLeft03").css({left:-3.384+"%"});
			walkerLeft03Loop();
		});
		
		function walkerLeft03Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*20000 );
				$(".city .walkerLeft03").delay(rdmDelay+100).animate({left:50+"%",bottom:0+"%"},20000,"linear").animate({left:100+"%",bottom:0},20000,"linear",function(){
					$(".city .walkerLeft03").css({left:-5.384+"%"});
				});
			},100);
		}

		//walkerRight01
		var walkerRightRdmPos = Math.round( Math.random()*50 );
		var walkerRightRdmPosDis = 100 - walkerRightRdmPos
		$(".city .walkerRight01").css({left:walkerRightRdmPosDis+"%"});
		$(".city .walkerRight01").animate({left:-3.384+"%",bottom:0},walkerRightRdmPosDis*420,"linear",function(){
			$(".city .walkerRight01").css({left:100+"%"});
			walkerRight01Loop();
		});
		
		function walkerRight01Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerRight01").delay(rdmDelay+100).animate({left:50+"%",bottom:0+"%"},20000*2,"linear").animate({left:-3.384+"%",bottom:0},20000*2,"linear",function(){
					$(".city .walkerRight01").css({left:100+"%"});
				});
			},100);
		}	

		//walkerR2
		var walkerRightRdmPos = Math.round( Math.random()*50 );
		var walkerRightRdmPosDis = 100 - walkerRightRdmPos
		$(".city .walkerR2").css({left:walkerRightRdmPosDis+"%"});
		$(".city .walkerR2").animate({left:-3.384+"%",bottom:0},walkerRightRdmPosDis*420,"linear",function(){
			$(".city .walkerR2").css({left:100+"%"});
			walkerR2Loop();
		});
		
		function walkerR2Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerR2").delay(rdmDelay+100).animate({left:50+"%",bottom:0+"px"},30000,"linear").animate({left:-3.384+"%",bottom:0},30000,"linear",function(){
					$(".city .walkerR2").css({left:100+"%"});
				});
			},100);
		}

		//walkerR3
		var walkerLeftRdmPos = Math.round( Math.random()*50 );
		var walkerLeftRdmPosDis = 100 - walkerLeftRdmPos
		$(".city .walkerR3").css({left:walkerLeftRdmPos+"%"});
		$(".city .walkerR3").animate({left:100+"%",bottom:0},walkerLeftRdmPosDis*460,"linear",function(){
			$(".city .walkerR3").css({left:-1.384+"%"});
			walkerLeft01Loop();
		});
		
		function walkerLeft01Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerR3").delay(rdmDelay+2000).animate({left:50+"%",bottom:0+"px"},20000,"linear").animate({left:100+"%",bottom:0},20000,"linear",function(){
					$(".city .walkerR3").css({left:-3.384+"%"});
				});
			},100);
		}

		//walkerRight02
		var walkerRightRdmPos = Math.round( Math.random()*50 );
		var walkerRightRdmPosDis = 100 - walkerRightRdmPos
		$(".city .walkerRight02").css({left:walkerRightRdmPosDis+"%"});
		$(".city .walkerRight02").animate({left:-3.384+"%",bottom:0},walkerRightRdmPosDis*420,"linear",function(){
			$(".city .walkerRight02").css({left:100+"%"});
			walkerRight02Loop();
		});
		
		function walkerRight02Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerRight02").delay(rdmDelay+500).animate({left:-30+"%",bottom:0+"%"},17000*3,"linear").animate({left:-3.384+"%",bottom:0},17000*3,"linear",function(){
					$(".city .walkerRight02").css({left:100+"%"});
				});
			},100);
		}

		//walkerRight03
		var walkerRightRdmPos = Math.round( Math.random()*50 );
		var walkerRightRdmPosDis = 100 - walkerRightRdmPos
		$(".city .walkerRight03").css({left:walkerRightRdmPosDis+"%"});
		$(".city .walkerRight03").animate({left:-3.384+"%",bottom:0},walkerRightRdmPosDis*720,"linear",function(){
			$(".city .walkerRight03").css({left:100+"%"});
			walkerRight03Loop();
		});
		
		function walkerRight03Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerRight03").delay(rdmDelay+100).animate({left:-20+"%",bottom:0+"px"},20000*4,"linear").animate({left:-3.384+"%",bottom:0},20000*4,"linear",function(){
					$(".city .walkerRight03").css({left:100+"%"});
				});
			},100);
		}
		
		//walkerRight04
		var walkerRightRdmPos = Math.round( Math.random()*50 );
		var walkerRightRdmPosDis = 100 - walkerRightRdmPos
		$(".city .walkerRight04").css({left:walkerRightRdmPosDis+"%"});
		$(".city .walkerRight04").animate({left:-10.384+"%",bottom:0},walkerRightRdmPosDis*500,"linear",function(){
			$(".city .walkerRight04").css({left:100+"%"});
			walkerRightLoop();
		});
		
		function walkerRightLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*8000 );
				$(".city .walkerRight04").delay(rdmDelay+100).animate({left:-10+"%",bottom:0+"px"},20000*3,"linear").animate({left:-10.384+"%",bottom:0},20000*3,"linear",function(){
					$(".city .walkerRight04").css({left:100+"%"});
				});
			},100);
		}
		
		//walkerL3
		var walkerL3RdmPos = Math.round( Math.random()*5000 );
		var walkerL3RdmPosDis = 100 - walkerL3RdmPos
		$(".city .walkerL3").css({left:walkerL3RdmPos+"%"});
		$(".city .walkerL3").animate({left:100+"%",bottom:0},walkerL3RdmPosDis*600,"linear",function(){
			$(".city .walkerL3").css({left:-8.384+"%"});
			walkerL3Loop();
		});
		
		function walkerL3Loop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*20000 );
				$(".city .walkerL3").delay(rdmDelay+4000).animate({left:50+"%",bottom:0+"%"},18000,"linear").animate({left:100+"%",bottom:0},18000,"linear",function(){
					$(".city .walkerL3").css({left:-3.384+"%"});
				});
			},100);
		}
		
		//travelerL
		// setInterval(function(){
		// 	var rdmDelay = Math.round( Math.random()*20000 );
		// 	$(".city .travelerL").delay(rdmDelay+4000).animate({left:50+"%",bottom:0+"%"},19000,"linear").animate({left:100+"%",bottom:0},19000,"linear",function(){
		// 		$(".city .travelerL").css({left:-3.384+"%"});
		// 	});
		// },100);
		
		//travelerR
		var travelerRRdmPos = Math.round( Math.random()*50 );
		var travelerRRdmPosDis = 100 - travelerRRdmPos
		$(".city .travelerR").css({left:travelerRRdmPos+"%"});
		$(".city .travelerR").animate({left:-3.384+"%",bottom:0},travelerRRdmPos*200,"linear",function(){
			$(".city .travelerR").css({left:100+"%"});
			travelerRLoop();
		});
		
		function travelerRLoop(){
			setInterval(function(){
				var rdmDelay = Math.round( Math.random()*20000 );
				$(".city .travelerR").delay(rdmDelay+2000).animate({left:50+"%",bottom:0+"px"},10000,"linear").animate({left:-3.384+"%",bottom:0},10000,"linear",function(){
					$(".city .travelerR").css({left:100+"%"});
				});
			},100);
		}
		
		//carL01
		setInterval(function(){
			var rdmDelay = Math.round( Math.random()*1000 );
			$(".city .carL01").delay(rdmDelay+200).animate({left:-30+"%",bottom:0},12000,"linear",function(){
				$(".city .carL01").css({left:100+"%"});
			});
		},100);
		
		//carL02
		setInterval(function(){
			var rdmDelay = Math.round( Math.random()*8000 );
			$(".city .carL02").delay(rdmDelay+500).animate({left:-35+"%",bottom:0},8500,"linear",function(){
				$(".city .carL02").css({left:100+"%"});
			});
		},100);
		
		//carL03
		// setInterval(function(){
		// 	var rdmDelay = Math.round( Math.random()*5000 );
		// 	$(".city .taxi_1L").delay(rdmDelay+1000).animate({right:-40+"%",bottom:0},10000,"linear",function(){
		// 		$(".city .taxi_1L").css({right:100+"%"});
		// 	});
		// },100);

		//carL04
		setInterval(function(){
			var rdmDelay = Math.round( Math.random()*8000 );
			$(".city .taxi_2L").delay(rdmDelay+1000).animate({left:-40+"%",bottom:0},9500,"linear",function(){
				$(".city .taxi_2L").css({left:100+"%"});
			});
		},100);
	});
</script>

<?php wp_footer(); ?>
</body>
</html>
