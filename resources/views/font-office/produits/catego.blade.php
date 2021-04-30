<x-master-layout>
<div class="container">
    <div class="row">
        <h2>Les categories de produits</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
            <form method="post" action="{{ route('categories.shows', $produit) }}">
                @csrf
                @method("PUT")
        
@include('partials._produit-form');

</div>

</div>

</x-master-layout>