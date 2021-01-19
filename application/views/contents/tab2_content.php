<!-- Structure definition of the zorkif content slider -->
<div class="zorkif_misbah_gallery">
    <div class="zorkif_misbah_gallery_header">
            <div class="zorkif_misbah_gallery_header_left_nav_button">
            <a href="">&nbsp;</a>
            </div><!-- end of zorkif_misbah_gallery_header_left_nav_button -->    
      <div class="zorkif_misbah_gallery_header_title">
        	Welcome to Noon Academy
      </div><!-- end of zorkif_misbah_gallery_header_left_nav_button -->    
            <div class="zorkif_misbah_gallery_header_right_nav_button">
            <a href="">&nbsp;</a>
            </div><!-- end of zorkif_misbah_gallery_header_right_nav_button -->
    </div><!-- end of gallery_header -->
    <div class="zorkif_misbah_gallery_content_slider">
	<img src="images/zorkif_misbah_gallery/slides/slide1.png" width="600" height="500" />    </div><!-- end of zorkif_misbah_gallery_content_slider -->
	<div class="zorkif_misbah_gallery_content_footer">
    	In the Name of Allah, The Most Merciful.
    </div><!-- end of zorkif_misbah_gallery_content_footer -->    
</div><!-- end of zorkif_misbah_gallery -->


<script type="text/javascript">
var TotalNumberOfSlides=4;
var SlideCounter=0;
// Left Gallery Header Menu Button
$('.zorkif_misbah_gallery_header_left_nav_button a').click(function(e){
		e.preventDefault();
		SlideCounter--;
		if(SlideCounter<=0) SlideCounter=TotalNumberOfSlides;
		var src = "images/zorkif_misbah_gallery/slides/slide"+SlideCounter+".png";        
		$(".zorkif_misbah_gallery_content_slider img").attr("src", src);		
	});
	
// Right Gallery Header Menu Button
$('.zorkif_misbah_gallery_header_right_nav_button a').click(function(e){
		e.preventDefault();
		if (SlideCounter==0) SlideCounter=1;
		SlideCounter++;
		if(SlideCounter>TotalNumberOfSlides) SlideCounter=1;
		var src = "images/zorkif_misbah_gallery/slides/slide"+SlideCounter+".png";        
		$(".zorkif_misbah_gallery_content_slider img").attr("src", src);
	});
</script>

