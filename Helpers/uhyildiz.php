<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class uhyildiz_help {
    
    function yildiz($puan=0){
        if($puan > 4): $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';
        elseif($puan > 3): $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';
               elseif($puan > 2): $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';
                  elseif($puan > 1): $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';
                   elseif($puan > 0): $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';

                else: $yildiz = '
            <div class="rating-box">
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            </div>';
                endif; 
                
                return $yildiz;
    }
    
    
    
    
    
}
