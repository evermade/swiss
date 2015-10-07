<?php

  $post_block = new Block;
  $post_block->get_fields(array('post_hero_image'), false);
  $post_block->set_background_image('post_hero_image');

  $img = 'http://fakeimg.pl/650x350/eeeeee/666/?text=img';

  if(is_array($post_block->fields['post_hero_image'])){
    $img = $post_block->fields['post_hero_image']['sizes']['post-thumb-cropped'];
  }

  ?>
    <div class="row">
    <article class="blog__post">
        <div class="row vertical-align">
            <div class="post__img">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $img; ?>" alt="<?php the_title(); ?>"/></a>
            </div>
            <div class="post__content">
              <div class="el">
                <h2 class="post__title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <p class="post__date"><?php echo get_the_date(); ?></p>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn visible-xs-inline-block">Read Article</a>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__read hidden-xs"></a>
              </div>
            </div>
            
        </div> 
        <div><hr></div>
    </article>
    </div>