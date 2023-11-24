<?php 
$categorie=get_the_terms( $post->ID, 'categorie' );

$args=array(
   "post_type"=>"photo",
   "tax_query"=>[
    "taxonomy"=>"categorie",
    "field"=>"slug",
    "terms"=>[$categorie[0]->slug]
   ],
   "post__not_in"=>[
    $post->ID
   ],
   "posts_per_page"=>2,
   );

$photoApparentee=new WP_Query($args);
?>

<div><hr></div>
<h3>VOUS AIMEREZ AUSSI</h3>
<div class="photosApparentees">
    <div class="blocPhotosApparentees">
        <?php 
        echo $photoApparentee->posts[0]->post_content;
        echo $photoApparentee->posts[1]->post_content;
        ?>
    </div>
    <div class="boutonPhotos">
        <button
            id="photosBTNP"
            class="boutonContact" 
            type="button">Toutes les photos</button>
    <div>
</div>