<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 1/6/18
 * Time: 5:33 PM
 */
?>
<div class="portfolio-content portfolio-1">
    <div id="js-filters-juicy-projects" class="cbp-l-filters-button">
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item btn dark btn-outline uppercase"> All
            <div class="cbp-filter-counter"></div>
        </div>
        @foreach($offer_statuses as $key => $offer_status)
            <div data-filter=".{{$offer_status->slug}}" class="cbp-filter-item btn dark btn-outline uppercase"> {{$offer_status->name}}
                <div class="cbp-filter-counter"></div>
            </div>
        @endforeach
    </div>
    <div id="js-grid-juicy-projects" class="cbp">
        @foreach($offers as $key => $offer)
            <div class="cbp-item {{$offer->offerStatus->slug}}">
                <div class="cbp-caption">
                    <div class="cbp-caption-defaultWrap">
                        <img src="{{($offer->offerImages->first() == null) ? '/uploads/no_image.jpg' : env('OFFER_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.sha1($offer->id).DIRECTORY_SEPARATOR.$offer->offerImages->first()}}"  alt=""> </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <a href="{{route('get-seller-profile')}}" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">more info</a>
                                <a href="{{($offer->offerImages->first() == null) ? '/uploads/no_image.jpg' : env('OFFER_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.sha1($offer->id).DIRECTORY_SEPARATOR.$offer->offerImages->first()}}" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">{{$offer->offerType->name}}</div>
                <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">{{$offer->description}}</div>
            </div>
        @endforeach
    </div>
    {{$offers->links()}}
    {{--<div id="js-loadMore-juicy-projects" class="cbp-l-loadMore-button">
        <a href="{{$offers->nextPageUrl()}}" class="cbp-l-loadMore-link btn grey-mint btn-outline">
            <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
            <span class="cbp-l-loadMore-loadingText">LOADING...</span>
            <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
        </a>
    </div>--}}
</div>
@section('javascript')
    <script src="/assets/custom/seller/load-offer.js" type="text/javascript"></script>
    <script src="/assets/custom/offer/offer-manage.js" type="text/javascript"></script>

    <script src="/assets/pages/scripts/portfolio-1.js" type="text/javascript"></script>

@endsection
