        <footer>
            
            <!-- Lightbox -->
            <?php $categorie=get_the_terms( $post->ID, 'categorie' ); ?>
            <a href="<?php the_permalink() ?>"></a>

            <div class="lightbox">
                <button class="lightbox__close"></button>
                <button class="lightbox__next">Suivant<span class="arrowNext"></span></button>
                <button class="lightbox__prev"><span class="arrowPrev"></span>Précédent</button>
                <div class="lightbox__container">
                    <img src="" alt="test">
                </div>
                <span id="photoReference"></span>
                <span id="photoCategorie"></span>
            </div>

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