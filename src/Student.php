<?php

    class Student
    {

//Properties
        private $name;
        private $enrollment_date;
        private $id;

//Constructor

        function __construct($name, $enrollment_date, $id = null)
        {
            $this->name = $name;
            $this->enrollment_date = $enrollment_date;
            $this->id = $id;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function getEnrollmentDate()
        {
            return $this->enrollment_date;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function setEnrollmentDate($new_enrollment_date)
        {
            $this->enrollment_date = $new_enrollment_date;
        }
//Regular Methods
        function save()
        {
            $date = $this->enrollment_date;
            $date_exploded = explode("-", $date);
            $date = $date_exploded[2] . "-" . $date_exploded[0] . "-" . $date_exploded[1];
            $date = strtotime($date);
            $date = Date('Y-m-d', $date);
            $GLOBALS['DB']->exec("INSERT INTO students (name, enrollment_date) VALUES ('{$this->name}', '{$date}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM students WHERE {$this->id};");
        }

        function update()
        {
            $date = $this->enrollment_date;
            $date_exploded = explode("-", $date);
            $date = $date_exploded[2] . "-" . $date_exploded[0] . "-" . $date_exploded[1];
            $date = strtotime($date);
            $date = Date('Y-m-d', $date);
            $GLOBALS['DB']->exec("UPDATE students SET name = '{$this->name}', enrollment_date = '{$date}' WHERE id = {$this->id};");
        }

        function addToCourseList($course)
        {
            // adds a course to the student's course list
            $GLOBALS['DB']->exec("INSERT INTO courses_students (course_id, student_id) VALUES ({$course->getId()}, {$this->id});");
        }

        function deleteCourseList()
        {
            // deletes all courses from the student's course list
            $GLOBALS['DB']->exec("DELETE FROM courses_students WHERE student_id = {$this->id};");
        }

        function deleteFromCourseList($course)
        {
            // deletes a course from the student's course list
            $GLOBALS['DB']->exec("DELETE FROM courses_students WHERE student_id = {$this->id} AND course_id = {$course->getId()};");
        }

        function getCourseList()
        {
            $results = $GLOBALS['DB']->query(
            "SELECT courses.id FROM
            courses JOIN courses_students ON (courses.id = courses_students.course_id)
                    JOIN students ON (courses_students.student_id = students.id)
            WHERE students.id = {$this->id};");
            $course_list = array();
            foreach($results as $result) {
                $new_course = Course::findById($result['id']);
                array_push($course_list, $new_course);
            }
            return $course_list;
        }

//Static Methods
        static function getAll()
        {
            $returned_students = array();
            $students = $GLOBALS['DB']->query("SELECT * FROM students;");
            foreach ($students as $student) {
                $name = $student['name'];
                $date = $student['enrollment_date'];
                $date = strtotime($date);
                $date = date('m-d-Y', $date);
                $id = $student['id'];
                $new_student = new Student($name, $date, $id);
                array_push($returned_students, $new_student);
            }
            return $returned_students;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM students;");
        }

        static function findById($search_id)
        {
            // instead of using static function getAll, only the needed student is returned, saving computing time
            $students = $GLOBALS['DB']->query("SELECT * FROM students WHERE id = {$search_id};");
            foreach($students as $student) {
                $name = $student['name'];
                $date = $student['enrollment_date'];
                $date = strtotime($date);
                $date = date('m-d-Y', $date);
                $id = $student['id'];
                $new_student = new Student($name, $date, $id);
                return $new_student;
            }
        }


//End Class        
    }
?>
