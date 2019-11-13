<?php

$post_id = get_the_ID();
$post_thumbnail_url = get_the_post_thumbnail_url( $post_id, 'full' );
$title = get_the_title();
$subtitle = get_field( 'subtitle', $post_id );

?>

<?php if ( $post_thumbnail_url ): ?>

    <div class="slider" style="position: relative;">
        <div class="ma-banner7-container">
            <div class="ma-owlCarousel">
                <div id="ma-owlCarousel" class="slides ">
                    <div class="item page-banner">
                        <div class="page-banner-panel" style="display: block; background: url(<?php echo $post_thumbnail_url; ?>) no-repeat center top; background-size: cover;">
                            <div class="text-table">
                                <div class="text-cell">
                                    <div class="text-content">
                                        <div class="text-subtitle"><?php echo $subtitle ? $subtitle : $title; ?></div>
                                    </div>
                                </div>
                            </div>
                            <img style="width:100%;" src="<?php echo $post_thumbnail_url; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>

    <div class="page-title-container container">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if ( $subtitle ): ?>
            <h2 class="page-subtitle"><?php echo $subtitle; ?></h2>
        <?php endif; ?>
    </div>

<?php endif; ?>