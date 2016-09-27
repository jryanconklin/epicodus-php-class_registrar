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

        }

        function update()
        {

        }

        function addCourse()
        {

        }

        function deleteCourse()
        {

        }

        function getCourseList()
        {

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

        static function findById()
        {

        }
    }
?>
