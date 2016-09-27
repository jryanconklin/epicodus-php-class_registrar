<?php

    class Course
    {

//Properties
        private $id;
        private $course_number;
        private $course_name;

//Constructor

        function __construct($course_number, $course_name, $id = null)
        {
            $this->course_number = $course_number;
            $this->course_name = $course_name;
            $this->id = $id;
        }

//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getCourseNumber()
        {
            return $this->course_number;
        }

        function getCourseName()
        {
            return $this->course_name;
        }

        function setCourseNumber($new_course_number)
        {
            $this->course_number = $new_course_number;
        }

        function setCourseName($new_course_name)
        {
            $this->course_name = $new_course_name;
        }
//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec(
            "INSERT INTO courses (course_number, course_name)
            VALUES ('{$this->course_number}', '{$this->course_name}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses WHERE id = {$this->id};");
        }

        function update()
        {
            $GLOBALS['DB']->exec("UPDATE courses SET course_name = '{$this->course_name}', course_number = '{$this->course_number}'  WHERE id = {$this->id};");
        }

        function addStudent()
        {

        }

        function deleteStudent()
        {

        }

        function getStudentList()
        {

        }
//Static Methods
        static function getAll()
        {
            $courses = array();
            $courses_data = $GLOBALS['DB']->query("SELECT * FROM courses;");
            foreach($courses_data as $course) {
                $id = $course['id'];
                $course_name = $course['course_name'];
                $course_number = $course['course_number'];
                $new_course = new Course($course_number, $course_name, $id);
                array_push($courses, $new_course);
            }
            return $courses;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM courses;");
        }

        static function findById($search_id)
        {
            $courses = Course::getAll();
            foreach($courses as $course) {
                if ($course->getId() == $search_id) {
                    return $course;
                }
            }
        }
    }
?>
