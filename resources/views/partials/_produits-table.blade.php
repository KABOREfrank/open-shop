<table class="table">
    <thead>
        <tr class="text-center">
            <th>Désignation</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Description</th>

          
            
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
                
                
            </tr> 
        @endforeach
       
    </tbody>
</table>