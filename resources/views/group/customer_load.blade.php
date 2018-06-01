<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 26/5/18
 * Time: 2:28 PM
 */
?>
<div class="mt-actions">
    @foreach($members as $member)
        <div class="mt-action">
            <div class="mt-action-img">
                <img class="img-responsive" src="{{($member->profile_picture == null) ? '/uploads/user_profile_male.jpg' : env('CUSTOMER_PROFILE_IMAGE_UPLOAD').DIRECTORY_SEPARATOR.$member->id.DIRECTORY_SEPARATOR.$member->profile_picture}}" /> </div>
            <div class="mt-action-body">
                <div class="mt-action-row">
                    <div class="mt-action-info ">
                        <div class="mt-action-icon ">
                            <i class="fa fa-group"></i>
                        </div>
                        <div class="mt-action-details ">
                            <span class="mt-action-author">{{ $member->first_name }}</span>
                            <p class="mt-action-desc">{{ $member->last_name }}</p>
                        </div>
                    </div>
                    <div class="mt-action-buttons ">
                        <div class="btn-group btn-group-circle">
                            <a href="{{ route('removeGroupMember',['group_id' => $group_id, 'user_id' => $member->id]) }}" class="btn btn-outline red btn-sm">remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{$memberList->links()}}