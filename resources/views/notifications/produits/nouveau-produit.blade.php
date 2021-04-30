@component('mail::message')
# Du nouveau sur OpenShop!
## Un nouveau surper produit vient  d'être ajouter sur votre superbe plaeforme OpenShop . Veuillez ne pas rater les occasions!

Vous trouverez ci dessous les informations sur le nouveau 
Pour commander ce produit cliquer sur le boutton ci dessous


### Désignation: {{ $produit->designation }}
### Prix: {{ $produit->prix }}
###  Categorie: {{ $produit->category->libelle }}

<br>
@component('mail::button', ['url' => route("produits.show",$produit)])
Commander ce produit
@endcomponent

Merrci d'avoir choisi OpenShop pour votre shopping, <br><br>
{{ config('app.name') }}
@endcomponent
