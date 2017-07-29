<div class="media">
    <a class="pull-left" href="{!! route('getUserProfile', $user->username) !!}">
        <img class="media-object" alt="{!! $user->username !!}" src="{!! $user->getProfilePicture($user) !!}" width="50" height="50">
    </a>
    <div class="media-body">
        <div class="col-md-6">
            <h4 class="media-heading" style="margin-top: 10px;">
                <a href="{!! route('getUserProfile', $user->username) !!}">{!! $user->fname . ' ' . $user->lname !!}</a>
                <p>{!! $user->email !!}</p>
                <p>{!! $user->username !!}</p>
            </h4>
        </div>
        @if(Request::is('user/*'))
            <div class="col-md-6">
                <input type="button" name="follow" value="Follow" id="follow" class="btn-sm btn btn-primary" style="margin-top: 10px; float: right;">
            </div>
        @endif
    </div>
</div>

<script>
$(document).ready(function() {
    getFollowData();
});
</script>