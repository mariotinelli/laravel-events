<!-- Titulo do evento -->
<div class="form-floating">
    <input type="text" class="form-control" name="title" id="title" placeholder="Título" required>
    <label for="title">Título</label>
</div>

<div class="flex-event-cep">
    <!-- CEP do evento -->
    <div class="form-floating">
        <input type="text" class="form-control" name="event_cep" id="event_cep" placeholder="CEP do local" required>
        <label for="event_cep">CEP do local</label>
    </div>
    
    <!-- Cidade do evento -->
    <div class="form-floating">
        <input type="text" class="form-control" name="event_city" id="event_city" placeholder="Cidade" disabled data-input>
        <label for="event_city">Cidade</label>
    </div>

    <!-- Estado do evento -->
    <div class="form-floating">
        <input type="text" class="form-control" name="event_state" id="event_state" placeholder="Estado" disabled data-input>
        <label for="event_state">Estado</label>
    </div>

</div>

<div class="flex-event-address">
    <!-- Endereço do evento -->
    <div class="form-floating">
        <input type="text" class="form-control" name="event_address" id="event_address" placeholder="Endereço" required>
        <label for="event_address">Endereço</label>
    </div>

    <!-- Numero do endereço do evento -->
    <div class="form-floating">
        <input type="number" class="form-control" name="event_address_number" id="event_address_number" placeholder="Número" required>
        <label for="event_address_number">Número</label>
    </div>
</div>

<div class="flex-date-capacity">
    <!-- Data do evento -->
    <div class="form-floating">
        <input type="text" class="form-control" name="date" id="date" placeholder="dd/mm/yyyy"  required>
        <label for="date">Data do evento</label>
    </div>

    <!-- Capacidade do evento -->
    <div class="form-floating">
        <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacidade do evento" required>
        <label for="capacity">Capacidade do evento</label>
    </div>
</div>

<!-- Categoria do evento -->
<select class="form-select py-3" name="event_category" id="event_category" required>
    <option selected> <p class="selected" >Selecione uma categoria</p> </option>
    <option value="1">Teste</option>
    <option value="2">Teste 2</option>
    <option value="3">Teste 3</option>
</select>

<!-- Descrição do evento -->
<div class="form-floating">
    <textarea class="form-control h-auto" name="description" id="description" placeholder="Descrição do evento" rows="7" required></textarea>
    <label for="description">Descrição do evento</label>
</div>

<button type="submit" class="btn btn-success w-25 align-self-end">
    Salvar Evento
</button>
