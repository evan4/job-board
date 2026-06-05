<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#',
    ]" />
    <x-job-card :$job>
        <p class="whitespace-pre-line text-sm text-slate-500 mb-4">{{ $job->description }}</p>
    </x-job-card>
</x-layout>
