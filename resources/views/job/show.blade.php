<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#',
    ]" />
    <x-job-card :$job>
        <p class="whitespace-pre-line text-sm text-slate-500 mb-4">{{ $job->description }}</p>
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">More job offers from {{ $job->employer->company_name }}</h2>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $employerJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-sm text-slate-700">
                            <a href="{{ route('jobs.show', $employerJob) }}">{{ $employerJob->title }}</a>
                        </div>
                        <span class="text-xs">{{ $employerJob->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-xs">${{ number_format($employerJob->salary) }}</div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
