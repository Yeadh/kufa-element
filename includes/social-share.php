<?php 

function kufa_social_sharing() {?>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook-f"></i></a>
    <a href="https://twitter.com/home?status=<?php the_permalink() ?>"><i class="fa fa-twitter"></i></a>
	<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&media=<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>&description=<?php the_title() ?>" class="pin-it-button" count-layout="horizontal"><i class="fa fa-linkedin"></i></a>  
	<?php
}