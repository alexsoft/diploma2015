@extends('_layouts.default')

@section('page_title', 'Диалог с ' . ($user->name ?: $user->nickname))

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

            @foreach($messages as $message)

                <div class="row" style="margin: 5px 0;">
                    @if(Auth::id() === $message->from_id)
                        @include('dialogs._partials.empty')

                        @include('dialogs._partials.message')

                        @include('dialogs._partials.author', ['email' => $message->from->email])
                    @elseif(Auth::id() === $message->to_id)
                        @include('dialogs._partials.author', ['email' => $message->from->email])

                        @include('dialogs._partials.message')

                        @include('dialogs._partials.empty')
                    @endif
                </div>

            @endforeach

        </div>
    </div>

    <div class="row" style="margin-bottom: 50px;">
        <div class="col-sm-6 col-sm-offset-3">

            <form action="">

                <div class="row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="msg">Сообщение</label>
                            <textarea name="msg" id="msg" cols="30" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Отправить"/>
                            <i class="fa fa-cog fa-lg fa-spin hide"></i>
                        </div>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>

            </form>


        </div>
    </div>

@endsection

@section('js')
    @parent
    <script>
        (function($) {
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);

            var $form = $('form');
            $form.on('submit', function(event) {
                event.preventDefault();

                $form.find('.fa-spin').removeClass('hide');

                $form.find('input, textarea').attr('disabled', 'disabled');

                $.ajax({
                    url: '{{ route('dialogs.create', $user->nickname) }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        _method: 'PUT',
                        message: $form.find('textarea').val()
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });

        })(jQuery);
    </script>
@endsection