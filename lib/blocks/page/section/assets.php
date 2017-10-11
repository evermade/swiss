<?php

/*
$asset['image']
$asset['placement']
$asset['z-index']
$asset['size']
$asset['margin']
$asset['position']
$asset['visibility']
$asset['animation_style']
$asset['animation_speed']
$asset['animation_delay']
$asset['custom_css']

 */

if($block->get('assets')){

    echo '<div class="b-section__assets">';

        foreach($block->get('assets') as $asset){

            // CREATE VARIABLES
            $assetClass = "";
            $assetAnimation = "";
            $assetStyle = "";

            // CLASS
            foreach($asset['position'] as $pos):
                $assetClass .= " c-section-asset--position-".$pos;
            endforeach;

            foreach($asset['visibility'] as $vis):
                $assetClass .= " h-visible-".$vis;
            endforeach;

            $assetClass .= " c-section-asset--zindex-".$asset['z-index'];
            $assetClass .= " c-section-asset--placement-".$asset['placement'];
            $assetClass .= " c-section-asset--size-".$asset['size'];

            // DATA ANIMATE
            if($asset['animation_style'] != "none" && $asset['animation_speed']){
                $assetAnimation .= 'data-animate="';
                $assetAnimation .= $asset['animation_style']." ";
                $assetAnimation .= "c-section-asset--anim-duration-".$asset['animation_speed']." ";
                $assetAnimation .= '" ';

                $assetStyle .= "animation-delay:".$asset['animation_delay']."s;";
            }

            // CSS
            if($asset['placement'] == "custom"){
                $assetStyle .= $asset['custom_css'];
            }

            $assetStyle .= 'background-image:url('.$asset['image']['url'].')';

            // COMBINE EVERYTHING
            echo '<div
                class="c-section-asset '.$assetClass.'"
                style="'.$assetStyle.'"
                '.$assetAnimation.'
            ></div>';

        }

    echo '</div>';

}
