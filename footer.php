<!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row top">

            <div class="col-eight md-six tab-full popular">
                <h3><?php _e("Popular Posts","philosophy");?></h3>

                <div class="block-1-2 block-m-full popular__posts">
                <?php 
                    $philosophy_populer_posts = new WP_QUERY( array(

                        'posts_per_page'      => 6,
                        'ignore_sticky_posts' => 1,
                        'orderby'             => "comment_count"
                      
                    ));
                    while( have_posts() ){
                       the_post();
                    ?>

                    <article class="col-block popular__post">
                        <a href="<?php the_permalink();?>" class="popular__thumb">
                            <?php the_post_thumbnail();?>
                        </a>
                        <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                        <section class="popular__meta">
                                <span class="popular__author"><span><?php _e("By","philosophy")?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID")));?>"> <?php the_author();?></a></span>
                            <span class="popular__date"><span><?php _e("on","philosophy")?></span> <time datetime="2017-12-19"><?php echo get_the_date();?></time></span>
                        </section>
                    </article>

                <?php
                  }
                  wp_reset_query();
                ?>
               </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
            
            <div class="col-four md-six tab-full about">
                <?php 
                    if ( is_active_sidebar( "before-footer-right" ) ){
                        dynamic_sidebar( "before-footer-right" );
                     }
                ?>
           
            </div> <!-- end about -->

        </div> <!-- end row -->

        <?php 

            $philosophy_display_tags = cs_get_option('footer_options');

            if( $philosophy_display_tags):

        ?>
        <div class="row bottom tags-wrap">

            <?php 

                $philoshophy_footer_tag_heading = apply_filters('philoshophy_footer_tag_heading',__('Tags','philosophy'));

                $philoshophy_footer_tag_items = apply_filters('philoshophy_footer_tag_items', get_tags());
            ?>
            <div class="col-full tags">
                <h3>
                    <?php 
                        echo esc_html($philoshophy_footer_tag_heading);
                    ?>
                </h3>

                <div class="tagcloud">
                   <?php 

                        //print_r($philoshophy_footer_tag_items);

                        if(is_array($philoshophy_footer_tag_items)){

                            foreach($philoshophy_footer_tag_items as $pttermsitem){

                                printf('<a href="%s">%s</a>', get_term_link($pttermsitem->term_id), $pttermsitem->name);

                            }
                        }

                   ?>
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->
        </div> <!-- end tags-wrap -->

    <?php endif;?>


    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-two md-four mob-full s-footer__sitelinks">
                        
                    <h4><?php _e("Quick Links","philosophy")?></h4>

                   

                     <?php
                       $philosophy_topmenu = wp_nav_menu(
                            array( 
                            'theme_location' => 'footer_left',
                            'menu_id'        => 'footer_left',
                            'menu_class'     => 's-footer__linklist'
                            
                           )
                        );
                      ?>

                     

                      

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__archives">
                        
                    
                    <h4><?php _e("Archives","philosophy")?></h4>

                  

                     <?php
                       $philosophy_topmenu = wp_nav_menu(
                            array( 
                            'theme_location' => 'footer_middle',
                            'menu_id'        => 'footer_middle',
                            'menu_class'     => 's-footer__linklist'
                            
                           )
                        );
                      ?>

                </div> <!-- end s-footer__archives -->

                <div class="col-two md-four mob-full s-footer__social">
                        
                  

                    <h4><?php _e("Social","philosophy")?></h4>

                    <?php
                       $philosophy_topmenu = wp_nav_menu(
                            array( 
                            'theme_location' => 'footer_right',
                            'menu_id'        => 'footer_right',
                            'menu_class'     => 's-footer__linklist'
                            
                           )
                        );
                      ?>

                </div> <!-- end s-footer__social -->

                <div class="col-five md-full end s-footer__subscribe">
                        
                    <h4><?php _e("Our Newsletter","philosophy");?></h4>

                    <?php if(is_active_sidebar( "footer-sectio" )){

                        dynamic_sidebar( "footer-sectio" );
                    }
                    
                    ?>

                    <div class="subscribe-form">
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                
                            <input type="submit" name="subscribe" value="Send">
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>
                    </div>

                    <?php 

                        $philosophy_facebook_link = cs_get_option( 'social_facebook' );

                        $philosophy_twitter_link = cs_get_option( 'social_twitter' );
                        //echo $philosophy_facebook_link;

                        if($philosophy_facebook_link){

                            echo "<a target='_blank' href='".esc_url($philosophy_facebook_link)."'><i class='fa fa-facebook'></i></a><br/>";
                        }

                        if($philosophy_twitter_link){

                            echo "<a target='_blank' href='".esc_url($philosophy_twitter_link)."'><i class='fa fa-twitter'></i></a>";
                        }
                    ?>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                    <?php if(is_active_sidebar( "footer-bottom" )){

                         dynamic_sidebar( "footer-bottom" );
                     }

                     ?>
                        
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <?php wp_footer();?>

</body>

</html>