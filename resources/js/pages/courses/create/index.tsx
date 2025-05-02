import React, { useEffect, useState } from 'react'
import DefaultLayout from '@/layouts/modified'
import { usePage, router } from '@inertiajs/react'
import { Department, Instructor } from '@/types/data'

export default function AddCourses() {

  const departments = usePage().props.departments as Array<Department>
  const instructors = usePage().props.instructors as Array<Instructor>

  const flash = usePage().props.flash as {
        error: string | null;
        success: string | null;
        warning: string | null;
        info: string | null;
    }

  useEffect(() => {
    if (flash.error) {
      // Handle errors here
      console.log(flash.error)
    }
  })

  const [values, setValues] = useState({
    title: '',
    instructor_id: '',
    department_id: '',
    credits : 0
  })

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    router.post(route('courses.create'), values)
  }

  return (
    <DefaultLayout>
        <div className="flex flex-col gap-4">
            <h1 className="text-2xl font-bold">Add Course</h1>
            <p className="">Create a new course.</p>
            {/* Add your form or component to create a student here */}

            {flash.error && (
                <div role="alert" className="alert alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{ flash.error }</span>
                </div>
            )}

            <div className='flex items-center justify-center'>
                <form onSubmit={handleSubmit} className="flex flex-1 flex-col gap-4 max-w-lg bg-gray-800 py-20 px-10 rounded-lg">
                    <input type="text" className="input border-gray-300 rounded p-2" placeholder='Title' id="title" value={values.title} onChange={(e) => setValues({...values, title : e.target.value})} />

                    <div className='flex flex-col gap-2'>
                        <label htmlFor="credits">Credits</label>
                        <input type="number" className="input border-gray-300 rounded p-2" placeholder='Credits' id="credits" value={values.credits} onChange={(e) => setValues({...values, credits : Number(e.target.value)})} />
                    </div>

                    <select name="department_id" className='select cursor-pointer' id="" value={values.department_id} onChange={(e) => setValues({...values, department_id: e.target.value})}>
                            <option value="">Select Department</option>
                            {departments.map(department => (
                                <option key={department.department_id} value={department.department_id}>{department.name}</option>
                            ))}
                    </select>

                    <select name="instructor_id" className='select cursor-pointer' id="" value={values.instructor_id} onChange={(e) => setValues({...values, instructor_id: e.target.value})}>
                            <option value="">Select Instructor</option>
                            {instructors.map(instructor => (
                                <option key={instructor.instructor_id} value={instructor.instructor_id}>{instructor.name}</option>
                            ))}
                    </select>

                    <div className='py-2'>
                        <button type="submit" className="bg-blue-500 text-white rounded p-2 cursor-pointer">Add Department</button>
                    </div>
                </form>
            </div>
        </div>
    </DefaultLayout>
  )
}
