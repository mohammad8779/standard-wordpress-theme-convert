<a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <?php
                       $philosophy_topmenu = wp_nav_menu(
                            array( 
                            'theme_location' => 'philosophy_tommenu',
                            'menu_id'        => 'philosophy_topmenu',
                            'menu_class'     => 'header__nav',
                            'echo'           => false
                           )
                        );
                      
                      $philosophy_topmenu = str_replace( "menu-item-has-children", "menu-item-has-children has-children", $philosophy_topmenu );
                       echo  $philosophy_topmenu;
                    ?>

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

</nav> <!-- end header__nav-wrap -->