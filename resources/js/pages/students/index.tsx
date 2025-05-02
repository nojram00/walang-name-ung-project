import { Student } from '@/types/data'
import { usePage, Link } from '@inertiajs/react'
import Layout from '@/layouts/modified'
import React from 'react'

export default function Students() {

    const props = usePage().props

    const students = props.students as Array<Student>

    const flash = usePage().props.flash as {
        error: string | null;
        success: string | null;
        warning: string | null;
        info: string | null;
    }

    return (
        <Layout>
            <div className='flex items-center justify-between'>
                <span>Students Table</span>
                <Link className="btn btn-primary" href='/students/create'>Add Student</Link>
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
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Department</th>
                        </tr>
                    </thead>
                    <tbody>
                        {students.map((student) => (
                            <tr key={student.student_id}>
                                <td>{student.student_id}</td>
                                <td>{student.name}</td>
                                <td>{student.department.name}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </Layout>
    )
}
