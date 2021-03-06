@extends('_layouts.default')

@section('page_title', 'Диалоги')

@section('content')

    <div class="row users-list">
        <div class="col-sm-8 col-sm-offset-2">

            <div class="row">
                <div class="col-sm-12">
                    <input type="text" v-model="search" class="form-control" placeholder="Поиск..."/>
                </div>
            </div>

            <div class="list-group" style="margin-top: 25px;">
                <a href="{{ route('dialogs.index') }}/@{{ nickname }}" class="list-group-item" v-repeat="users | filterBy search">
                    @{{ nickname }}
                </a>
            </div>
        </div>
    </div>

    @include('_partials._modals.info')
@endsection

@section('js')
    @parent
    <script>
        new Vue({
            el: '.users-list',

            ready: function() {
                this.fetchUsers();
            },

            methods: {
                fetchUsers: function() {
                    this.$http.get('/users', function(users) {
                        this.$set('users', users);
                    })
                }
            }
        });

        (function($) {

            var $modal = $('.info-modal'),
                userName = $modal.data('name');

            if (userName === '') {
                $modal.modal();
            }

            $('.js-save-info').on('click', function() {
                var data = {
                    _method: 'PUT',
                    user: {
                        name:  $('#name').val()
                    }
                };

                $.ajax({
                    url: '{{ route('users.update', Auth::user()->nickname) }}',
                    data: data,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });

        })(jQuery);
    </script>
@endsection
