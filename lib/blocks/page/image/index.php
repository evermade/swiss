<?php
// lets keep block data in class for encapsulation and stopping conflicts across blocks
$block = new \Swiss\Block;

// set and get the acf fields for this block
$block->get_fields(array('image_images', 'image_wrapper'));

echo '<section class="b-image">';

    echo '<div class="b-image__'.$block->fields['image_wrapper'].'">';

        foreach ($block->fields['image_images'] as $image) {

            $imageCSS = "";
            $imageWrapperCSS = "";
            $imageWrapperClass = "";

            if($image['breakpoints']){
                $imageWrapperClass .= " h-visible-".$image['breakpoints'];
            }

            if($image['maximum_width']){

                $imageWrapperCSS .= "max-width:".$image['maximum_width']."px;";

            }

            if($image['image_height'] == "keep-height"){

                $imageCSS .= "height:".$image['image']['height']."px;";

            } else {

                $paddingTop = $image['image']['height']/$image['image']['width']*100;
                $imageCSS .= "padding-top:".$paddingTop."%;";

            }

            $imageCSS .= "background-image:url('".$image['image']['url']."');";

            include(__DIR__.'/view.php');

    }

    echo '</div>';

echo '</section>';