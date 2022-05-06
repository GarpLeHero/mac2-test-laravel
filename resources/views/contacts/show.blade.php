@extends('layouts.master')
 
@section('title', 'Csontact')
 
@section('content')
<div class="col-md-12">
    <div class="p-6">
        <div class="ml-12">
            @if (isset($contact))

            <div class="col-md-12">
                <strong>Informations</strong><br>
                <div class="table-responsive">
                <table class="table table-user-information">
                    <tbody>
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                    ID                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->id}}     
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-user  text-primary"></span>    
                                    Nom                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->nom}}     
                            </td>
                        </tr>
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                    Prénoms                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->nom}}   
                            </td>
                        </tr>
    
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-bookmark text-primary"></span> 
                                    email                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->email}}  
                            </td>
                        </tr>
    
    
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-eye-open text-primary"></span> 
                                    Téléphone                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->tel}} 
                            </td>
                        </tr>
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                    Adresse                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->adresse}}  
                            </td>
                        </tr>
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Code Postal                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->code_postal}} 
                            </td>
                        </tr>
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Ville                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {{$contact->ville}} 
                            </td>
                        </tr> 
                        <tr>        
                            <td>
                                <strong>
                                    <span class="glyphicon glyphicon-calendar text-primary"></span>
                                    Commentaire                                                
                                </strong>
                            </td>
                            <td class="text-primary">
                                {!! nl2br($contact->commentaire) !!} 
                            </td>
                        </tr>                                     
                    </tbody>
                </table>
                </div>
            </div>
	        @endif
        </div>
    </div>
</div>
@endsection