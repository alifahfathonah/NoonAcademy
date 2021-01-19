<div id="zorkif_slider" class="round_corners">
            
                <div id="wrapper" class="zorkif_slider_wrapper">
                  <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="images/slides/slide1.jpg" alt="" data-transition="boxRandom"/>
                        <img src="images/slides/slide2.jpg" alt="" data-transition="boxRandom"/>
                        <img src="images/slides/slide3.jpg" alt="" data-transition="boxRandom"/>
                        <img src="images/slides/slide4.jpg" alt="" data-transition="boxRandom"/>
                    </div>
                  </div>
                </div>
			<script type="text/javascript" src="scripts/nivo-slider/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                //$('#slider').nivoSlider();  // Defualt Behaviour
                
                
                    $('#slider').nivoSlider({
                        effect: 'fade',
                        controlNav: false
                     });
            });
            </script><!-- end of nivo slider -->         
            	<div class="zorkif_slider_menu_bar">
                     <div class="clear_all"></div> 
                     <a href="#" id="overview"><?php echo LINK_OVERVIEW; ?></a> 
                     <a href="#" id="gallery"  class="active"><?php echo LINK_GALLERY; ?></a>
                     <a href="#" id="press"><?php echo LINK_PRESS_NEWS; ?></a>
                </div>          
            </div><!-- zorkif_slider -->