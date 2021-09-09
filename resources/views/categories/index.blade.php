


@foreach($categories as $categorie)
<option value="{{ $categorie->id }}">{{ $categorie->description }}</option>
@endforeach
