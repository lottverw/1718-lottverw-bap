@extends('layouts.app')
@section('content')
  <section class="child">
    <a href='/' class="close"><i class="fa fa-angle-left"></i></a>
    <div class="grid flex row justified-s">
      <div class="column">   
        <div class="item">
          <h1>algemene info</h1>
          <p class="label">naam</p>
          <p class="separation">{{$child->name}}</p>
          <p class="label">geboortendatum</p>
          <p class="separation">{{$child->birthday}}</p>
          <p class="label">geslacht</p>
          <p class="separation">{{$child->gender}}</p>
          <p class="label">adres</p>
          @foreach($addresses as $address)
          <p class="separation">{{$address->street}} {{$address->number}}, {{$address->postal_code}} {{$address->street}}</p>
          @endforeach
        </div>

        <div class="item">
          <h1>ouders</h1>
          @foreach($parents as $parent)
          <p class='label'>{{$parent->relation}}</p>
          <p>{{$parent->name}}</p>
          <p class='label'>contact</p>
          <p class="separation">{{$parent->phone}}</p>
          @endforeach
        </div>

        <div class="item">
          <h1>dokter</h1>
          <p class='label'>dokter</p>
          <p class="separation">{{$child->doctor}}</p>
          <p class='label'>telefoonnummer</p>
          <p class="separation">Tel. {{$child->doctor_phone}}</p>
        </div>
      </div>

      <div class="column">   
        <div class="item">
          <h1>Bevoegd om top te halen</h1>
          @if(count($guardians) > 0)
            @foreach($guardians as $guardian)
            <p class='label'>{{$guardian->name}}</p>
            <p class="separation">{{$guardian->phone}}</p>
            @endforeach
            @else 
             <p>Naast de ouders is niemand bevoegd dit kind op te halen.</p>
          @endif
         
        </div>

        <div class="item allergy">
          <h1>Allergieën</h1>
          @if(count($allergies) > 0 )
            @foreach($allergies as $allergy)
            <div class="flex row justified-s">
              <div >
                <p class='label'>type</p>
                <p class="flex-child end">{{$allergy->type}}</p>
              </div>
              <p class='text-align-r flex-child end label'>{{$allergy->gravity}}</p>
            </div>
            <p class='label'>omschrijving</p>
            @if($allergy->medication != null) 
              <p>{{$allergy->description}}</p>
              <p class='label'>medicatie</p>
              <p>{{$allergy->medication}}</p>
              <p class='label'>voorschrift</p>
              <p class='separation'>{{$allergy->prescription}}</p>
            @else 
             <p class='separation'>{{$allergy->description}}</p>
            @endif
            @endforeach
          @else 
            <p class='alert text-align-c'>Dit kind heeft <span class="bold underline">geen</span> gekende allergieën</p>
          @endif
        </div>

        <div class="item">
          <h1>Andere opmerkingen</h1>
          @if(count($other_information) > 0 )
            @foreach($other_information as $info)
              <p class="separation">{{$info->message}}</p>
            @endforeach
          @else
            <p class="text-align-c"><span class="bold underline">Geen</span> opmerkingen</p>
          @endif
        </div>
      </div>

      <div class="column">   

        <div class="item">
        <h1>Pedagogische aandacht</h1>
        @foreach($pedagogic as $peda)
          <p class='label'>omschrijving</p>
          @if($peda->medication != null) 
            <p class="separation">{{$peda->description}}</p>
            <p class='label'>medicatie</p>
            <p>{{$peda->medication}}</p>
            <p class='label'>voorschrift</p>
            <p class='separation'>{{$peda->prescription}}</p>
          @else 
            <p class="separation">{{$peda->description}}</p>
          @endif
        @endforeach
        </div>

        @if($child->potty_trained == false)  
          <div class="item">
            <h1>Zindelijkheidstraining</h1>
            <p class="alert text-align-c">Dit kind is nog <span class="bold underline">niet zindelijk</span>.</p>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection('content')