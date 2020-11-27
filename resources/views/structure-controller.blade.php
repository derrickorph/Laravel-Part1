@include('headers')
<h1>Test Blade</h1>

@php
    $name='Derrick';
    $fruits= array('Mangue','Orange','Banane','Pomme');
    $age=18;

@endphp
<h3>{{ $name }}</h3>

<h2>Fruits</h2>
@foreach ($fruits as $fruit)
    <ul>
        <li>{{ $fruit }}</li>
    </ul>
@endforeach

<br>
@for ($i = 1; $i <=10; $i++)
     {{ $i }}
@endfor
<br>
<br>
<br>

@if (count($fruits)==1)
    Single Fruit
@elseif(count($fruits)>1)
    More than one Fruit
@else
    No Fruit
@endif
<br>
<br>

{{ $age>=18? 'Tu es adulte': 'Tu es mineur' }}
