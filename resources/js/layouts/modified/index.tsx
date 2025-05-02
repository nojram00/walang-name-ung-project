import { Link } from '@inertiajs/react';
import React from 'react';

const DefaultLayout = ({ children } : { children : React.ReactNode }) => {
    return (
        <div className="min-h-screen bg-gray-700 flex flex-col">
            <header className="bg-gray-800 text-white py-2 flex flex-row justify-between px-5">
                <h1>Project X</h1>
                <nav>
                    <ul className="flex flex-row justify-around gap-5">
                        <li><Link className='nav-link' href="/students">Students</Link></li>
                        <li><Link className='nav-link' href="/courses">Courses</Link></li>
                        <li><Link className='nav-link' href="/departments">Departments</Link></li>
                        <li><Link className='nav-link' href="/instructors">Instructors</Link></li>
                    </ul>
                </nav>
            </header>
            <main className="flex-1 p-4">
                {children}
            </main>
            <footer className="bg-gray-800 text-white py-2 p-5">
                <p>&copy; { (new Date()).getFullYear().toLocaleString().replace(',','') } Project X. All rights reserved.</p>
            </footer>
        </div>
    );
};

export default DefaultLayout;