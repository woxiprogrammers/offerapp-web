<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 26/5/18
 * Time: 11:59 AM
 */
?>
<div class="mt-actions">
    @foreach($groups as $group)
        <div class="mt-action">
            <div class="mt-action-img">
                <img src="/assets/pages/media/users/avatar10.jpg" /> </div>
            <div class="mt-action-body">
                <div class="mt-action-row">
                    <div class="mt-action-info ">
                        <div class="mt-action-icon ">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="mt-action-details ">
                            <span class="mt-action-author">{{ $group->name }}</span>
                            <p class="mt-action-desc">{{ $group->description }}</p>
                        </div>
                    </div>
                    <div class="mt-action-datetime ">
                        <span class="mt-action-dot bg-green"></span>
                        <span class="mt-action-date">{{ date('D, d M Y, H:i',strtotime($group->created_at)) }}</span>
                    </div>
                    <div class="mt-action-buttons ">
                        <div class="btn-group btn-group-circle">
                            <a href="{{ route('groupOfferListing',['group_id' => $group->id]) }}" class="btn btn-outline green btn-sm">
                                Offers
                            </a>
                            <a href="{{ route('groupMemberListing',['group_id' => $group->id]) }}" class="btn btn-outline red btn-sm">
                                Info
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $groups->links() }}