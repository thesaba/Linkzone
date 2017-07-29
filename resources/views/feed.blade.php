@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="#" method="post">
                <div class="form-group">
                    <textarea placeholder="What's up {!! Auth::user()->fname !!} ?" name="status" id="status" class="form-control" rows="2" required></textarea>
                </div>
                <button type="submit" id="PostStatus" class="btn btn-default">Post</button>
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div id="app">
                <statuses></statuses>
            </div>

            <template id="statuses-template">
                <div>
                    <div class="media" v-for="status in statuses">
                        <a class="pull-left" :href="'/user/' + status.user.username">
                            <img class="media-object" :alt="status.user.username" src="{!! asset('assets/img/user.png') !!}" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a :href="'/user/' + status.user.username">@{{ status.user.fname + ' ' + status.user.lname }}</a></h4>
                            <p v-if="status.user.id == user"><a :href="'/feed/status/' + status.id + '/delete/' + status.user.id">Delete</a></p>
                            <p>@{{ status.body }}</p>
                            <ul class="list-inline">
                                <li>@{{ status.created_at }}</li>
                            </ul>

                            <div class="media" v-for="reply in status.replies">
                                <a class="pull-left" :href="'/user/' + reply.user.username">
                                    <img class="media-object" alt="" src="{!! asset('assets/img/user.png') !!}" width="25" height="25">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><a :href="'/user/' + reply.user.username">@{{ reply.user.fname + ' ' + reply.user.lname }}</a></h5>
                                    <p v-if="reply.user.id == user"><a :href="'/feed/status/' + reply.id + '/delete/' + reply.user.id">Delete</a></p>
                                    <p>@{{ reply.body }}</p>
                                    <ul class="list-inline">
                                        <li>@{{ reply.created_at }}</li>
                                    </ul>
                                </div>
                            </div>

                            <form role="form" :action="'/feed/status/' + status.id + '/reply'" method="post">
                                <div class="form-group">
                                    <textarea :name="'reply-' + status.id" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
                                </div>

                                {!! csrf_field() !!}

                                <input type="submit" value="Reply" class="btn btn-default btn-sm">
                            </form>
                        </div>
                    </div>

                    <br /> <br />
                </div>
            </template>
        </div>
    </div>

    <script src="https://unpkg.com/vue"></script>

    <script>
        Vue.component('statuses', {
            template: '#statuses-template',

            data: function() {
                return {
                    statuses: [],
                    user: {!! Auth::user()->id !!},
                }
            },

            created: function() {
                this.getStatuses();
            },

            methods: {
                getStatuses: function() {
                    $.getJSON("{{ route('getStatuses') }}", function(statuses) {
                        this.statuses = statuses;
                    }.bind(this));

                    setTimeout(this.getStatuses, 2500);
                },
            }
        });
        new Vue({
            el: '#app'
        });
    </script>
@endsection