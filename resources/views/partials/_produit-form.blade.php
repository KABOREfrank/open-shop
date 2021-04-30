<div class="form-group">
    <label for="designation">Designation</label>
    <input value="{{ old('designation')?? $produit->designation }}" type="text" name="designation" id="designation" class="form-control" placeholder="" aria-describedby="helpId" required>
   
    @error('designation')
    <small  class="text-danger"> {{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label for="prix">Prix</label>
    <input value="{{ old('prix')?? $produit->prix }}"type="number" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId" required>
    @error('prix')
    <small  class="text-danger"> {{ $message }}</small>
    @enderror
  </div>

  
  <div class="form-group">
      <label for="quantite">Quantité</label>
      <input value="{{  old('quantite')?? $produit->quantite }}" type="number" name="quantite" id="quantite" class="form-control" placeholder="" aria-describedby="helpId" required>
      @error('quantite')
      <small  class="text-danger"> {{ $message }}</small>
      @enderror
  </div>

  
  <div class="form-group">
      <label for="category_id">Catégorie</label>
      <select class="form-control" name="category_id" id="category_id" required>
          @foreach ($categories as $categorie)
          <option {{ $categorie->id== $produit->category_id ? "selected" : "" }} value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
          @endforeach
      </select>
  </div>
  
  <div class="form-group">
      <label for="description">Description</label>                           
     <textarea name="description" id="description"  rows="3"> {{ old("description") }}</textarea>
      @error('description')
      <small  class="text-danger"> {{ $message }}</small>
      @enderror
  </div>
  
<div class="form-group">
  <label for="">Image</label>
  <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">selection d'un image</small>

  @error('image')
      <small  class="text-danger"> {{ $message }}</small>
      @enderror
</div>

  <button type="submit" class="btn btn-primary btn-block btn-lg mt-4" >Valider</button>



  
  