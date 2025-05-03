<x-main-layout>
    <div class="flex items-center justify-between">
        <span>Courses</span>
        <a class="btn btn-primary" href="{{ route('courses.create') }}">Add Courses</a>
    </div>
    @if (session('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Instructor</th>
                    <th>Credits</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->department->name }}</td>
                        <td>{{ $course->instructor->name }}</td>
                        <td>{{ $course->credits }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main-layout>