<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enviar notificaciones a <span class="counter"></span> seleccionados</h4>
            </div>
            <div class="modal-body">
                <h4>Hola NOMBRE DE CLIENTE,</h4>
                {!! Form::open(['route' => ['maintenances.send'], 'method' => 'POST']) !!}
                <div class="form-group">
                    <label>Texto (opcional):</label>
                    {!! Form::textarea('text_email_notification', $config->text_email_notification, ['class' => 'form-control']) !!}
                </div>
                <input type="hidden" name="users" id="checkedUsers">
                <p>Gracias,</p>
                <p>Automec</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary send-email"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Enviando">Enviar
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>