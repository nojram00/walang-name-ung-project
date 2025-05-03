<x-main-layout>
    <div class="flex flex-col gap-4">
        <h1 class="text-2xl font-bold">Create Student</h1>
        <p class="">Create a new student record.</p>

        @if(session('error'))
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <div class='flex items-center justify-center'>
            <form action="{{ route('students.create') }}" method="POST"  class="flex flex-1 flex-col gap-4 max-w-lg bg-gray-800 py-20 px-10 rounded-lg">
                <input type="text" class="input border-gray-300 rounded p-2" name="name" placeholder='Name' id="name"/>

                <select name="department_id" class='select cursor-pointer' id="" >
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_id }}">{{ $department->name }}</option>
                        @endforeach
                </select>
                <div class='py-2'>
                    <button type="submit" class="bg-blue-500 text-white rounded p-2 cursor-pointer">Create Student</button>
                </div>
            </form>
        </div>
    </div>
</x-main-layout>