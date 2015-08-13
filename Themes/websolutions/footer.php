	<!--==============================footer=================================-->
    <footer>
        <div class="main zerogrid">
        	<div class="row">
            	<article class="col-1-4">
                    <div class="wrap-col">
                        <?php if(!dynamic_sidebar('icons-footer')): ?>
                            <ul class="list-services">
                                <li><p>Место для иконок</p></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </article>
                <article class="col-1-4">
                	<div class="wrap-col">
                        <h5>Navigation</h5>
                        <?php wp_nav_menu(array(
                                    'theme_location' => 'header-menu', 
                                    'container' => 'nav',
                                    'menu_class'=> 'list-1'
                                ));  ?>   
                    </div>
                </article>
                <article class="col-1-4">
                    <div class="wrap-col">
                    	<h5>Contact</h5>
                        <dl class="contact">
                            <?php if(!dynamic_sidebar('contacts-footer')): ?>
                                <p>Место для контактной информации</p>
                            <?php endif; ?>
                            <dd><span>Phone:</span>  <?php echo get_option('my_phone'); ?></dd>
                            <dd><span>Fax:</span>  <?php echo get_option('my_fax'); ?></dd>
                         </dl>
                    </div>
                </article>
                <article class="col-1-4">
                    <div class="wrap-col">
                    	<h5>Legal</h5>
                        <?php if(!dynamic_sidebar('legal-footer')): ?>
                                <p>Место для информации</p>
                            <?php endif; ?>
                    </div>
                </article>
            </div>
        </div>
    </footer>
	<script type="text/javascript"> Cufon.now(); </script>
    <script type="text/javascript">
		$(window).load(function(){
			$('.slider')._TMS({
				duration:800,
				easing:'easeOutQuad',
				preset:'simpleFade',
				pagination:true,//'.pagination',true,'<ul></ul>'
				pagNums:false,
				slideshow:7000,
				banners:'fade',// fromLeft, fromRight, fromTop, fromBottom
				waitBannerAnimation:false
			})
		})
	</script>
        <?php wp_footer(); ?>
</body>
</html>