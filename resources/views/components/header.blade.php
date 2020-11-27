<div>
    <h1 class="text-success">This is Header Component</h1>
    <h3>Hello {{ $name }}</h3>
    <h3>Les fruits sont :</h3>
    <ol>
        @foreach ($fruits as $fruit)
            <li>{{  $fruit}}</li>
        @endforeach
    </ol>
</div>
