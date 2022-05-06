@extends('layouts.master')
 
@section('title', 'Tous les contacts')
 
@section('content')
<div class="grid ">
    
    <div class="p-12 ">
        <div class="col-md-12">
		   <table class="table table-striped">
			<thead>
			  <tr>
				<th class="text-dark">Nom</th>
				<th class="text-dark">Prénoms</th>
				<th class="text-dark">Email</th>
				<th class="text-dark">Tel</th>
				<th class="text-dark">Adresse</th>
				<th class="text-dark">Code postal</th>
				<th class="text-dark">Ville</th>
				<th class="text-dark">Actions</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($contacts as $contact)
				<tr>
					<td>
						{{$contact->nom}}
					</td>
					<td>
						{{$contact->prenoms}}
					</td>
					<td>
						{{$contact->email}}
					</td>
					<td>
						{{$contact->tel}}
					</td>
					<td>
						{{$contact->adresse}}
					</td>
					<td>
						{{$contact->code_postal}}
					</td>
					<td>
						{{$contact->ville}}
					</td>
					<td>
						<a href="{{ route('contacts.show', $contact) }}" title="Voir" >
							<i class="bi bi-eye-fill"></i>
						</a>
						&nbsp;
						<a href="{{ route('contacts.edit', $contact) }}" title="Modifier" >
							<i class="bi bi-pencil-square"></i>
						</a>
						&nbsp;
						<form method="POST"
							 style="display:inline;" 
							 onSubmit="return confirm('Voulez vous vraiment supprimer	?') "
							 action="{{ route('contacts.destroy', $contact) }}" >
							@csrf
							@method("DELETE")
							<button type="submit" class="inline" title="Supprimer" >
								<i class="bi bi-trash-fill"></i>
							</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		  </table>
        </div>
    </div>
</div>
@endsection