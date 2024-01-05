        <footer>
            <div class="footer">
                <div class="line">
                </div>
                <div class="menuFooter">
                    <nav id="navigation-footer" role="navigation" aria-label="<?php _e('Menu Footer', 'text-domain'); ?>">
                        <?php wp_nav_menu( array( 
                            'theme_location' => 'menu-footer' ) ); 
                        ?>
                    </nav>
                </div>
            </div>
        </footer>
        <?php     get_template_part( 'template-parts/contact' );
        ?>
        <?php wp_footer(); 
        ?>
    </body>
</html>