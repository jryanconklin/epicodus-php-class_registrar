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

        }

        function delete()
        {

        }

        function update()
        {

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

        }

        static function deleteAll()
        {

        }

        static function findById()
        {

        }
    }
?>
