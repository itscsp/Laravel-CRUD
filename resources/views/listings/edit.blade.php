<x-layout>
{{-- <div class=" m-auto"> --}}
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit  Gig
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>
        
        <form method="post" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"
                    >Company Name</label
                >
                <input
                    value="{{$listing->company}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                />
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
        
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Job Title</label
                >
                <input
                value="{{$listing->title}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                />
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
        
            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                    >Job Location</label
                >
                <input
                value="{{$listing->location}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>
        
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                value="{{$listing->email}}"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        
            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    Website/Application URL
                </label>
                <input
                value="{{$listing->website}}"
                
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                />
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
        
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                value="{{$listing->tags}}"
            
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                />

                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
        
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
                <img
                class="w-48 mr-6 mb-6"
                src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('/images/no-image.png')}}"
                alt=""
            />
                
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
        
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                
                class="border border-gray-200 rounded p-2 w-full"
                name="description"
                rows="10"
                placeholder="Include tasks, requirements, salary, etc"
               
                > {{$listing->description}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            </div>
        
            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Gig
                </button>
        
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
{{-- </div> --}}


</x-layout>
