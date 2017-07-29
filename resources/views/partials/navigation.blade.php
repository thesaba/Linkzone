<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="{!! route('getHome') !!}" class="navbar-brand">Linkzone</a>
        </div>

        <div class="collapse navbar-collapse">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <li><a href="{!! route('getHome') !!}">Feed</a></li>
                    <li><a href="{!! route('getFollowing') !!}">Following</a></li>
                    <li><a href="{!! route('getFollowers') !!}">Followers</a></li>
                </ul>

                <form action="{!! route('getSearchResults') !!}" role="search" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="Find people"/>
                    </div>

                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li><a href="{!! route('getUserProfile', Auth::user()->username) !!}">{!! Auth::user()->username !!}</a></li>
                    <li><a href="{!! route('getUpdateProfile') !!}">Update profile</a></li>
                    <li><a href="{!! route('getLogout') !!}">Sign out</a></li>
                @else
                    <li><a href="{!! route('getLogin') !!}">Sign in</a></li>
                    <li><a href="{!! route('getRegister') !!}">Sign up</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>