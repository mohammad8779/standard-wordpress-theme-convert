<?php
the_post();
get_header();?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?php the_title();?>
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date"><?php the_date();?></li>
                    <li class="cat">
                        In
                        <a href="#0"><?php the_category( " " );?></a>
                        
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail("large");?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <?php the_content();


                //this below code for csf group metabox data without theme options panel

                $metabox_group_data = get_post_meta(get_the_ID(),'post_group_data',true);

                $group_data = $metabox_group_data['group_field'];

                //var_dump($group_data);

                /*
                echo "<pre>";
                 print_r( $group_data );
                echo "</pre>";

                */

                foreach($group_data as $gd){
                    echo esc_html($gd['text_data']);
                    echo "<br/>";
                    echo get_the_title($gd['select_data']);
                    echo wp_get_attachment_image($gd['image_data']);

                    echo "<hr/>";
                }

                //this below code for specific metabox data

                echo esc_html($group_data[1]['text_data']);
                echo "<br/>";
                echo get_the_title($group_data[1]['select_data']);
                echo "<br/>";
                echo wp_get_attachment_image($group_data[1]['image_data']);

                echo"<br/>";
                echo"<br/>";
                echo"<br/>";
                echo"<hr/>";



                //this below code for csf group metabox data from theme options panel

                echo "<h2>". __("Metabox Data From Theme Panel","philosophy") ."
                </h2>";

                $metabox_data_from_theme_option = cs_get_option('group_field');

                //echo"<pre>";

                   // print_r($metabox_data_from_theme_option);
               // echo"</pre>";

                foreach($metabox_data_from_theme_option as $mdftho){
                    echo esc_html($mdftho['text_data']);
                    echo "<br/>";
                    echo get_the_title($mdftho['select_data']);
                    echo wp_get_attachment_image($mdftho['image_data']);

                    echo "<hr/>";
                }

                //this below code for specific metabox data

                echo esc_html($metabox_data_from_theme_option[1]['text_data']);
                echo "<br/>";
                echo get_the_title($metabox_data_from_theme_option[1]['select_data']);
                echo "<br/>";
                echo wp_get_attachment_image($metabox_data_from_theme_option[1]['image_data']);

                echo"<br/>";





                ?>



              <p class="s-content__tags">
                    <span>Post Tags</span>

                    <span class="s-content__tag-list">
                        
                       <?php 
                         the_tags("", "", "");
                        ?>
                    </span>
                </p> <!-- end s-content__tags -->

                <div class="s-content__author">
                    <?php echo get_avatar(get_the_author_meta("ID"));?>

                    <div class="s-content__author-about">
                        <h4 class="s-content__author-name">
                            <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta("ID") ) );?>">
                                <?php the_author();?>
                            </a>
                        </h4>
                    
                        <p>
                            <?php the_author_meta("description") ?>
                        </p>

                        <ul class="s-content__author-social">
                            <?php 
                                $philosophy_user_facebook = get_field("facebook","user_" .get_the_author_meta("ID"));
                                $philosophy_user_twitter = get_field("twitter","user_" .get_the_author_meta("ID"));
                                $philosophy_user_instagram = get_field("instagram","user_" .get_the_author_meta("ID"));
                            ?>
                            <?php if($philosophy_user_facebook):?>
                             <li><a href="<?php echo esc_url( $philosophy_user_facebook );?>">Facebook</a></li>
                            <?php endif;?>

                             <?php if($philosophy_user_twitter):?>
                             <li><a href="<?php echo esc_url( $philosophy_user_twitter );?>">Twitter</a></li>
                            <?php endif;?>

                             <?php if($philosophy_user_instagram):?>
                             <li><a href="<?php echo esc_url( $philosophy_user_instagram );?>">Twitter</a></li>
                            <?php endif;?>
                           
                        </ul>
                    </div>
                </div>

                <div class="s-content__pagenav">
                    <div class="s-content__nav">

                        <?php 

                          $philosophy_prev_post = get_previous_post();
                          if( $philosophy_prev_post):

                        ?>
                        <div class="s-content__prev">
                            <a href="<?php echo  get_the_permalink($philosophy_prev_post)?>" rel="prev">
                                <span><?php _e("Previous Post","philosophy");?></span>
                                <?php echo get_the_title($philosophy_prev_post);?>
                            </a>
                        </div>

                    <?php endif;?>
                    
                    <?php 

                          $philosophy_next_post = get_next_post();
                          if( $philosophy_prev_post):

                        ?>
                        <div class="s-content__prev">
                            <a href="<?php echo  get_the_permalink($philosophy_next_post)?>" rel="prev">
                                <span><?php _e("Next Post","philosophy");?></span>
                                <?php echo get_the_title($philosophy_next_post);?>
                            </a>
                        </div>

                    <?php endif;?>

                      
                    </div>
                </div> <!-- end s-content__pagenav -->

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
       <?php 
          if(!post_password_required()){
                comments_template();
          }
       ?>

    </section> <!-- s-content -->

<?php get_footer();?>