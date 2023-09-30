<div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text" id="nombres" name="nombres" class="form-control" value="{{ isset($seguimiento->nombres)?$seguimiento->nombres:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ isset($seguimiento->apellidos)?$seguimiento->apellidos:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="asunto" class="form-label">Asunto:</label>
            <input type="text" id="asunto" name="asunto" class="form-control" value="{{ isset($seguimiento->asunto)?$seguimiento->asunto:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="form-control" value="{{ isset($seguimiento->correo)?$seguimiento->correo:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ isset($seguimiento->telefono)?$seguimiento->telefono:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" id="fecha" name="fecha" class="form-control" value="{{ isset($seguimiento->fecha)?$seguimiento->fecha:'' }}" required>
        </div>

        <div class="mb-3">
            <label for="dias" class="form-label">Días:</label>
            <input type="text" id="dias" name="dias" class="form-control" value="{{ isset($seguimiento->dias)?$seguimiento->dias:'' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>