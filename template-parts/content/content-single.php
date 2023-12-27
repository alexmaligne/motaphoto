<a href="<?php the_permalink() ?>">

    <div class="photo">
        <div class="filterEye">
            <img class="iconEye" 
            src="<?php echo get_template_directory_uri() . '/img/Icon_eye.png'; ?> "
            alt="Alt text hover" />
        </div>
        <img class="iconFullScreen" 
            src="<?php echo get_template_directory_uri() . '/img/Icon_fullscreen.png'; ?> "
            alt="Alt text hover" />

        <span id="photoReference"><?php echo get_field( "reference" ) ?></span>
        
        <?php
            the_content();
        ?>

    </div>
</a>

<!-- au survol -->