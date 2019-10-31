@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h1>{{ __('Ritten') }}</h1>
                    </div>
                    <div>{{ $rits->links() }}</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Van</th>
                                    <th scope="col">Naar</th>
                                    <th scope="col">Beginstand</th>
                                    <th scope="col">Eindstand</th>
                                    <th scope="col">Retour</th>
                                    <th scope="col">Zakelijk</th>
                                    <th scope="col">Omschrijving</th>
                                    <th scope="col">Datum</th>
                                    <th scope="col">Tijd Geleden</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($rits as $rit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $rits->perPage() * ($rits->currentPage() - 1)}}</th>
                                    <td>{{ $rit->van }}</td>
                                    <td>{{ $rit->naar }}</td>
                                    <td>{{ $rit->beginstand }}</td>
                                    <td>{{ $rit->eindstand }}</td>
                                    <td>{{ $rit->retour ? 'Ja' : 'Nee'  }}</td>
                                    <td>{{ $rit->zakelijk ? 'Ja' : 'Nee'  }}</td>
                                    <td>{{ $rit->omschrijving }}</td>
                                    <td>{{ Carbon\Carbon::parse($rit->created_at)->format('d-m-Y')  }}</td>
                                    <td>{{ $rit->created_at->diffForHumans() }}</td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            <!-- {{ $rits->links() }} -->
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Totaal aantal: {{ $rits->total() }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection