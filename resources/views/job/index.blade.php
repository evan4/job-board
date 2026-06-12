<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]" />
    <x-card class="mb-4 text-sm" x-data="">
        <form action="{{ route('jobs.index') }}" method="GET" id="filtering-form" x-ref="filters">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" form-ref="filters" value="{{ request('search') }}" type="text"
                        placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" form-ref="filters" value="{{ request('min_salary') }}"
                            type="text" placeholder="From" />
                        <x-text-input name="max_salary" form-ref="filters" value="{{ request('max_salary') }}"
                            type="text" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\JobsList::$experience),
                        \App\Models\JobsList::$experience,
                    )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\JobsList::$categories" />
                </div>
            </div>
            <x-button class="w-full">Filter</x-button>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :$job class="mb-4">
            <div>
                <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
