export interface Student {
    student_id: number;
    name: string;
    department: Department;
}

export interface Department {
    department_id: number;
    name: string;
    office : string;
}

export interface Course {
    course_id: number;
    title: string;
    department: Department;
    instructor: Instructor;
    credit: number;
}

export interface Instructor {
    instructor_id: number;
    name: string;
    email: string;
}