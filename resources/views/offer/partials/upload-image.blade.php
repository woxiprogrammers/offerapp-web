<?php
/**
 * Created by PhpStorm.
 * User: harsha
 * Date: 25/3/18
 * Time: 6:47 PM
 */
?>

@if($path!=null)
    <tr id="image-{{$random}}">
        <td>
            <a href="{{$path}}" target="_blank" class="fancybox-button" data-rel="fancybox-button">
                <img class="img-responsive" src="{{$path}}" alt="" style="width:100px; height:100px;"> </a>
            <input type="hidden" class="product-image-name" name="offer_images[{{$random}}][image_name]" id="product-image-name-{{$random}}" value="{{$path}}"/>
        </td>
        <td>
            <a href="javascript:;" class="btn btn-default btn-sm" onclick='removeProductImages("#image-{{$random}}","{{$path}}",0);'>
                <i class="fa fa-times"></i> Remove </a>
        </td>
    </tr>
@endif

