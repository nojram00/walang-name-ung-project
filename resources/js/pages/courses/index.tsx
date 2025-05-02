import { Course } from '@/types/data'
import { Link, usePage } from '@inertiajs/react'
import Layout from '@/layouts/modified'
import React from 'react'

export default function Courses() {

    const props = usePage().props

    const courses = props.courses as Array<Course>

    const flash = usePage().props.flash as {
        error: string | null;
        success: string | null;
        warning: string | null;
        info: string | null;
    }

    return (
        <Layout>
            <div className='flex items-center justify-between'>
                <span>Courses</span>
                <Link className="btn btn-primary" href='/courses/create'>Add Courses</Link>
            </div>
            {flash.success && (
                <div role="alert" className="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{ flash.success }</span>
                </div>
            )}
            <div className='overflow-x-auto'>
                <table className='table'>
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Instructor</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {courses.map((course) => (
                            <tr key={course.course_id}>
                                <td>{course.course_id}</td>
                                <td>{course.title}</td>
                                <td>{course.department.name}</td>
                                <td>{course.instructor.name}</td>
                                <td>{course.credit}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </Layout>
    )
}
