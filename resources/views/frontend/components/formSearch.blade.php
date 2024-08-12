<div class="col-6 mx-auto my-2 ">
    <form method="GET" action="{{ route('buscarPropiedad') }}" id="searchForm" name="searchForm" role="form">
        @csrf
        <div class="row">
            <div class="input-group">
                <button type="submit" class="btn btn-light border fw-bold z-1"><i class="bi bi-search"></i></button>
                <input type="text" class="form-control" name="searchQuery" placeholder="{{ __('message.State, city, property type, price')}}">
            </div>
        </div>
    </form>
</div>