<!-- Imagem do evento -->
<div class="p-3 form-group event-image rounded w-50">
    <div class="d-flex justify-content-between">
        <div class="">
            <label for="image">
                Anexe uma Imagem
            </label>

            <div class="mt-2 d-none">
                <input
                    type="file" name="image" id="image" accept="image/*"
                    @change="fileChosen" />
            </div>

            <label class="file-choose-button mt-3" for="image">
                Escolher
            </label>
        </div>

        <div class="event-image-cover">

            <!-- Show the image -->
            <div class="image-preview border rounded border-gray-200 bg-gray-500 {{ isset($event) ? '' : 'd-none' }}" style="width: 100%; height: 100%;">
                <img src="{{ isset($event) ? asset("storage/$event->image") : '' }}" class="object-cover"
                    style="width: 100%; height: 100%; max-height: 112px" />
            </div>

            <!-- Show the gray box when image is not available -->
            <div class="gray-box border rounded border-gray-200 bg-gray-500 {{ isset($event) ? 'd-none' : '' }}" style="width: 100%; height: 100%;"></div>

        </div>
    </div>
</div>

<!-- Titulo do evento -->
<div class="form-floating">
    <input
        type="text"
        class="form-control"
        name="title"
        id="title"
        value="{{ old('title', $event->title ?? '')}}"
        placeholder="Título"
        required>
    <label for="title">Título</label>
</div>

<div class="flex-event-cep">
    <!-- CEP do evento -->
    <div class="form-floating">
        <input
            type="text"
            maxlength="9"
            class="form-control"
            name="event_cep"
            id="event_cep"
            placeholder="CEP"
            value="{{ old('event_cep', $event->event_cep ?? '')}}"
            required>
        <label for="event_cep">CEP</label>
    </div>

    <!-- Cidade do evento -->
    <div class="form-floating">
        <input
            type="text"
            class="form-control"
            id="temp-event-city"
            placeholder="Cidade"
            value="{{ old('event_city', $event->event_city ?? '')}}"
            disabled>
        <input
            type="hidden"
            name="event_city"
            id="event_city"
            value="{{ old('event_city', $event->event_city ?? '')}}"
        >
        <label for="event_city">Cidade</label>
    </div>

    <!-- Estado do evento -->
    <div class="form-floating">
        <input
            type="text"
            class="form-control"
            id="temp-event-state"
            value="{{ old('event_state', $event->event_state ?? '')}}"
            placeholder="Estado"
            disabled>
        <input
            type="hidden"
            name="event_state"
            id="event_state"
            value="{{ old('event_state', $event->event_state ?? '')}}"
        >
        <label for="event_state">Estado</label>
    </div>

</div>

<div class="flex-event-address">
    <!-- Endereço do evento -->
    <div class="form-floating">
        <input
            type="text"
            class="form-control"
            name="event_address"
            id="event_address"
            placeholder="Logradouro"
            value="{{ old('event_address', $event->event_address ?? '')}}"
            required>
        <label for="event_address">Logradouro</label>
    </div>

    <!-- Bairro do endereço do evento -->
    <div class="form-floating">
        <input
            type="text"
            class="form-control"
            name="event_address_district"
            id="event_address_district"
            placeholder="Bairro"
            value="{{ old('event_address_district', $event->event_address_district ?? '')}}"
            required>
        <label for="event_address_district">Bairro</label>
    </div>

    <!-- Numero do endereço do evento -->
    <div class="form-floating">
        <input
            type="number"
            class="form-control"
            name="event_address_number"
            id="event_address_number"
            placeholder="Número"
            value="{{ old('event_address_number', $event->event_address_number ?? '')}}"
            required>
        <label for="event_address_number">Número</label>
    </div>
</div>

<div class="flex-date-capacity">
    <!-- Data do evento -->
    <div class="form-floating">
        <input
            type="date"
            class="form-control"
            name="date"
            id="date"
            placeholder="dd/mm/yyyy"
            value="{{ old('date', $event->date ?? '')}}"
            required>
        <label for="date">Data do evento</label>
    </div>

    <!-- Capacidade do evento -->
    <div class="form-floating">
        <input
            type="number"
            class="form-control"
            name="capacity"
            id="capacity"
            placeholder="Capacidade do evento"
            value="{{ old('capacity', $event->capacity ?? '')}}"
            required>
        <label for="capacity">Capacidade do evento</label>
    </div>
</div>

<!-- Categoria do evento -->
<select class="form-select py-3" name="id_event_category" id="id_event_category" required>
    @php $selected = old('id_event_category', (isset($event) ? $event->id_event_category : '')) @endphp
    <option value="0" disabled {{ empty($selected) ? 'selected' : '' }}>
        Selecione uma categoria
    </option>

    @foreach ($event_categories as $key => $event_category)
        <option value={{$key}} {{ $selected == $event_category ? 'selected' : '' }}>{{$event_category}}</option>
    @endforeach
</select>

<!-- Descrição do evento -->
<div class="form-floating">
    <textarea class="form-control h-auto" name="description" id="description" placeholder="Descrição do evento" rows="7" required>
        {{ old('description', $event->description ?? '')}}
    </textarea>
    <label for="description">Descrição do evento</label>
</div>

<button
    type="submit" id="saveEvent" class="btn btn-success w-25 align-self-end">
    Salvar Evento
</button>
