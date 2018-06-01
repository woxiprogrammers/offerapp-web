<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 26/5/18
 * Time: 12:28 PM
 */
?>


<div class="mt-actions">
    @foreach($offers as $offer)
        <div class="mt-action">
            <div class="mt-action-body">
                <div class="mt-action-row">
                    <div >
                        <img class="img-thumbnail" src="{{($offer['offerImage'] == null) ? '/uploads/no_offer_image.jpg' : env('OFFER_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.sha1($offer['offer_id']).DIRECTORY_SEPARATOR.$offer['offerImage']}}" />
                    </div>

                    <div class="mt-action-info ">
                        <div class="mt-action-icon ">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="mt-action-details ">
                            <span class="mt-action-author">{{ $offer['offer_type_name'] }}</span>
                            <p class="mt-action-desc">{{ $offer['offer_description'] }}</p>
                            <span class="mt-action-author">{{ $offer['offer_status_name'] }}</span>

                        </div>
                    </div>
                    <div class="mt-action-datetime ">
                        <span class="mt-action-dot bg-green"></span>
                        <span class="mt-action-date">{{ date('D, d M Y, H:i',strtotime($offer['start_date'])) }}</span>
                        <span class="mt-action-dot bg-red"></span>
                        <span class="mt-action-date">{{ date('D, d M Y, H:i',strtotime($offer['end_date'])) }}</span>
                    </div>
                    <div class="mt-action-buttons ">
                        <div class="btn-group btn-group-circle">
                            <a href="{{ route('removeGroupOffer',['group_id' => $group_id, 'offer_id' => $offer['offer_id']]) }}" class="btn btn-outline red btn-sm">remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $offerList->links() }}
