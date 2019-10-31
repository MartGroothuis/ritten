@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h1>{{ __('Locations') }}</h1>
                    </div>
                    <div>{{ $locations->links() }}</div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                    <form method="post" action="/locations/store" autocomplete="off">
                        @csrf
                        <div class="form-row align-items-center">

                            <div class="col-auto col-md-8 col-12 my-1">
                                <label for="name">{{ __('Naam van Plaats') }}</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Naam') }}" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="col-auto col-md-4 col-12 my-1">
                                <label for="inlineFormInputGroupUsername">Submit</label>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-outline-primary w-100">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Naam</th>
                                    <th scope="col" class="text-right">Verwijderen</th>
                                    <!-- <th scope="col">Beginstand</th>
                                    <th scope="col">Eindstand</th>
                                    <th scope="col">Retour</th>
                                    <th scope="col">Zakelijk</th>
                                    <th scope="col">Omschrijving</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($locations as $location)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $locations->perPage() * ($locations->currentPage() - 1)}}</th>
                                    <td>{{ $location->name }}</td>
                                    <td><a class="btn btn-outline-danger float-right" href="locations/delete/{{ $location->id }}">Verwijderen</a></td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Totaal aantal: {{ $locations->total() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection