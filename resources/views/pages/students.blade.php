<x-main-layout>
    <div class='flex items-center justify-between'>
        <span>Students Table</span>
        <a class="btn btn-primary" href='/students/create'>Add Student</a>
    </div>
    @if(session('success'))
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class='overflow-x-auto'>
        <table class='table'>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->department->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-main-layout>