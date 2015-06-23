<div class="col-sm-8">
    <p><small><strong>{{ $message->from->name }}</strong></small></p>
    <p>
        {{ $message->message }}
    </p>
    <p><small class="text-muted" style="font-size: 10px;">{{ $message->created_at }}</small></p>
</div>