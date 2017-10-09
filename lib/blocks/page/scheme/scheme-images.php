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

if($block->fields['scheme_images']){

    echo '<div class="b-scheme__images">';

        foreach($block->fields['scheme_images'] as $asset){

            // CREATE VARIABLES
            $assetClass = "";
            $assetAnimation = "";
            $assetStyle = "";

            // CLASS
            foreach($asset['position'] as $pos):
                $assetClass .= " c-scheme-asset--position-".$pos;
            endforeach;

            foreach($asset['visibility'] as $vis):
                $assetClass .= " c-scheme-asset--visibility-".$vis;
            endforeach;

            $assetClass .= " c-scheme-asset--zindex-".$asset['z-index'];
            $assetClass .= " c-scheme-asset--placement-".$asset['placement'];
            $assetClass .= " c-scheme-asset--size-".$asset['size'];

            // DATA ANIMATE
            if($asset['animation_style'] != "none" && $asset['animation_speed']){
                $assetAnimation .= 'data-animate="';
                $assetAnimation .= $asset['animation_style']." ";
                $assetAnimation .= "c-scheme-asset--anim-duration-".$asset['animation_speed']." ";
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
                class="c-scheme-asset '.$assetClass.'" 
                style="'.$assetStyle.'"
                '.$assetAnimation.'
            ></div>';

        }

    echo '</div>';

}