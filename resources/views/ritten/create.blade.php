@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Ritten') }}</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form method="post" action="/ritten/store" autocomplete="off" class="typeahead" role="search">
                        @csrf

                        <div class="form-group">
                            <label for="van">{{ __('Van') }}</label>
                            <input type="search" id="van" name="van" class="form-control search-input" placeholder="{{ __('Van') }}" autocomplete="off" value="{{ old('van') }}">

                        </div>

                        <div class="form-group">
                            <label for="naar">{{ __('Naar') }}</label>
                            <input type="search" id="naar" name="naar" class="form-control search-input" placeholder="{{ __('Naar') }}" autocomplete="off" value="{{ old('naar') }}">
                        </div>

                        <div class="form-group">
                            <label for="beginstand">{{ __('Beginstand') }}</label>
                            <input type="number" class="form-control" id="beginstand" name="beginstand" placeholder="{{ __('Beginstand') }}" autocomplete="off" value="{{ old('beginstand') }}">
                        </div>

                        <div class="form-group">
                            <label for="eindstand">{{ __('Eindstand') }}</label>
                            <input type="number" class="form-control" id="eindstand" name="eindstand" placeholder="{{ __('Eindstand') }}" autocomplete="off" value="{{ old('eindstand') }}">
                        </div>

                        <div class="form-group">
                            <label for="omschrijving">{{ __('Omschrijving') }}</label>
                            <input type="text" class="form-control" id="omschrijving" name="omschrijving" placeholder="{{ __('Omschrijving') }}" value="{{ old('omschrijving') }}">
                        </div>

                        <div class="d-flex flex-row">

                            <button type="submit" class="btn btn-outline-primary">Submit</button>

                            <div class="form-group form-check m-2 ml-4">
                                <input type="checkbox" class="form-check-input" id="retour" name="retour">
                                <label class="form-check-label" for="retour">{{ __('Retour') }}</label>
                            </div>

                            <div class="form-group form-check m-2 ml-4">
                                <input type="checkbox" class="form-check-input" id="zakelijk" name="zakelijk">
                                <label class="form-check-label" for="zakelijk">{{ __('Zakelijk') }}</label>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('scripts')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins  and Typeahead) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Typeahead.js Bundle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<!-- Typeahead Initialization -->
<script src="{{ asset('js/autocomplete.js') }}"></script>

@endsection