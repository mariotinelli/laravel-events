<h3 class="mb-4">Filtros</h3>
<div class="filter-date">
    {{-- <form> --}}

        <label class="form-label" for="filter-date-from">De</label>
        <input class="form-control" name="filter-date-from" id="filter-date-from" value="{{ $filterDateFrom ?? '' }}" type="date">

        <label class="form-label" for="filter-date-to">Até</label>
        <input class="form-control mb-2" name="filter-date-to" id="filter-date-to" value="{{ $filterDateTo ?? '' }}" type="date">

        <a role="button" class="btn btn-dark active-filter w-100">Pesquisar</a>
    {{-- </form> --}}
</div>

<div class="filter-categories mt-4">
    <h5 class="mb-4">Categorias</h5>
    @foreach ($categories as $category)
        {{-- <form class="list-group"> --}}
            {{-- <input type="hidden" name="filter-category" id="filter-category" value="{{$category->id_event_category}}"> --}}
            <button
                type="submit"
                name="category"
                id="category_{{$category->id_event_category}}"
                data-value="{{$category->id_event_category}}"
                class="category-filter list-group-item list-group-item-action list-group-item-dark active-filter"
            >
                {{$category->name}}
            </button>
        {{-- </form> --}}
    @endforeach
</div>
