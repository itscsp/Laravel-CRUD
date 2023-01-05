<x-layout>

@include('partials._hero')

@include('partials._search')
<div class="container m-auto">

    <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4">
    
            
    @foreach($listings as $listing)
        {{-- <h2>
            <a href="/listings/{{$list['id']}}">
                {{ $list['title'] }}
            </a>    
        
        </h2>
        <p>{{ $list['description'] }}</p> --}}
    
    
        <x-listing-card :listing="$listing" />

        
    
    
    @endforeach;    
    
    </div>
</div>

</x-layout>