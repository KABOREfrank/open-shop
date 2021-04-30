<x-master-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mt-2">Tous nos produits</h1>
                <h5 class="text-center"> Notre catalogue comporte {{ nb_produit(562)  }}</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                @if(session('statut'))
            <div class="col-md-12 text-center"> 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{ session('statut') }}</strong> 
                </div>
            </div>
            @endif

            @if (Auth::user()!=null && Auth::user()->isAdmin())
                <div class="ml-2">
                <a class="btn btn-primary btn sm" href="{{ route('produits.create') }}"><i class="fas fa-plus"></i> Ajouter </a>
            </div>
            @endif

                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Désignation</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Description</th>
                            <th>Actions</th>
                                    
                            @if(Auth::user()!=null && Auth::user()->isAdmin())
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td scope="row">{{ $produit->designation }}</td>
                                <td>{{ separateur_fcfa($produit->prix)  }}</td>
                                <td>{{ $produit->quantite }}</td>
                                <td>{{ $produit->description }}</td>
                                <td class="d-flex">

                                <a class="btn btn-info btn-sm mr-2" href="{{ route('produits.show', $produit) }}"><i class="fas fa-eye"></i></a>
                                @if (Auth::user()!=null && Auth::user()->isAdmin())
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('produits.edit', $produit) }}"><i class="fas fa-edit"></i></a>
                                <a onclick="event.preventDefault(); delConfirm('{{ $produit->id }}')"  class="btn btn-danger btn-sm" href="{{ route('produits.destroy', $produit) }}"><i class="fas fa-trash"></i></a>
                                @endif
                                    <form style="display: none" id="{{ $produit->id }}" method="POST" action="{{ route('produits.destroy', $produit->id) }}">
                                        @csrf
                                        @method("DELETE");
                                    </form>
                                </td>
                            </tr> 
                        @endforeach
                       
                    </tbody>
                </table>
                <div class="row d-flex mt-5 justify-content-center bg-dark">
                        {{ $produits->links() }}
                </div>
            </div>
        </div>
    </div>
</x-master-layout>