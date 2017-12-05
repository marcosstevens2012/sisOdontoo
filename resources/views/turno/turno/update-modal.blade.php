<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="#UpdateTurno{{$tur->idturno}}">
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input value="{{ $tur->estado}}" title="Solo puede ingresar letras en este campo." id="Primer nombre" type="text" class="validate" required>
                    <label for="Primer nombre">Primer nombre:</label>
                </div>
            </div>
        </div>
    </div>