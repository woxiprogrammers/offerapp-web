<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 1/6/18
 * Time: 11:59 AM
 */
?>
<div class="cbp-l-project-container">
    <div class="cbp-l-project-related">
        <div class="cbp-l-project-desc-title">
            <span>Related Offers</span>
        </div>
        <ul class="cbp-l-project-related-wrap">
            @foreach($offers as $key => $offer)
                <li class="cbp-l-project-related-item">
                    <a href="" class="cbp-singlePage cbp-l-project-related-link" rel="nofollow">
                        <img src="{{($offer->offerImages->first() == null) ? '/uploads/no_image.jpg' : env('OFFER_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.sha1($offer->id).DIRECTORY_SEPARATOR.$offer->offerImages->first()}}"  alt="">
                        <div class="cbp-l-project-related-title">
                            {{$offer->offerType->name}}
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
{{$offers->links()}}