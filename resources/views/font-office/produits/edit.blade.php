<x-master-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    Modification un  nouveau produit!
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <form method="post" action="{{ route('produits.update', $produit) }}">
                        @csrf
                        @method("PUT")
                
    @include('partials._produit-form');

                    </form>
            </div>
        </div>
    </div>
</x-master-layout>