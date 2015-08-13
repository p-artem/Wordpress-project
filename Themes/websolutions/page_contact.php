<?php 
/*   
Template Name: Страница контактов
*/
?>
<?php get_header(); ?>
<!--==============================content================================-->
    <section id="content">
        <div class="main zerogrid">
                <div class="row">
                	<article class="col-3-4">
                            <div class="wrap-col">
	                    	<h3>Contact Form</h3>
	                        <form id="contact-form" method="post" enctype="multipart/form-data">                    
	                            <fieldset>
	                                  <label><span class="text-form">Your Name:</span><input type="text"></label>
	                                  <label><span class="text-form">Your Email:</span><input type="text"></label>                              
	                                  <div class="wrapper">
	                                    <div class="text-form">Your Message:</div>
	                                    <div class="extra-wrap">
	                                        <textarea></textarea>
	                                        <div class="clear"></div>
	                                        <div class="buttons">
	                                        	<span class="button-2">
	                                                <a onClick="document.getElementById('contact-form').reset()"><strong>clear</strong></a>
	                                            </span>
	                                            <span class="button-2">
	                                                <a onClick="document.getElementById('contact-form').submit()"><strong>send</strong></a>
	                                            </span>
	                                        </div> 
	                                    </div>
	                                  </div>                            
	                            </fieldset>						
	                        </form>
			</div>
                    </article>
                    <article class="col-1-4">
						<div class="wrap-col">
	                    	<h3>Our Clients</h3>
	                        <div class="wrapper img-indent-bot">
	                            <figure class="map-border">
	                                <iframe width="216" height="180" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
	                            </figure>
	                        </div>
	                        <dl>
	                            <dt class="p2">USA 8901 Marmora Rd, Glasgow</dt>
	                            <dd><span>Freephone:</span>  <?php echo get_option('my_free'); ?></dd>
	                            <dd><span>Telephone:</span>  <?php echo get_option('my_phone'); ?></dd>
	                            <dd><span>Fax:</span>  <?php echo get_option('my_fax'); ?></dd>
	                            <dd><span>Email:</span> <a class="link" href="mailto:<?php bloginfo('admin_email'); ?>"><?php bloginfo('admin_email'); ?></a></dd>
	                        </dl>
						</div>
                    </article>
                </div>
        </div>
    </section>
<?php get_footer(); ?>