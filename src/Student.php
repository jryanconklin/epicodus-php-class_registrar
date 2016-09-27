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

        }

        static function deleteAll()
        {

        }

        static function findById()
        {

        }
    }
?>
