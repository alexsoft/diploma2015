<div class="modal fade info-modal" data-name="{{ Auth::user()->name }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Заполните дополнительную информацию</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('name', 'Имя') !!}
                    {!! Form::text('name', Auth::user()->name, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block btn-lg btn-primary js-save-info">Сохранить</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->