import { Department } from '@/types/data'
import { Link, usePage } from '@inertiajs/react'
import Layout from '@/layouts/modified'
import React from 'react'

export default function Departments() {

    const props = usePage().props

    const departments = props.departments as Array<Department>

    const flash = usePage().props.flash as {
        error: string | null;
        success: string | null;
        warning: string | null;
        info: string | null;
    }

    return (
        <Layout>
            <div className='flex items-center justify-between'>
                <span>Departments</span>
                <Link className="btn btn-primary" href='/departments/create'>Add Department</Link>
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
                            <th>Department ID</th>
                            <th>Name</th>
                            <th>Office</th>
                        </tr>
                    </thead>
                    <tbody>
                        {departments.map((department) => (
                            <tr key={department.department_id}>
                                <td>{department.department_id}</td>
                                <td>{department.name}</td>
                                <td>{department.office}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </Layout>
    )
}
