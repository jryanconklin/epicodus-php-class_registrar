<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../inc/ConnectionTest.php";
    require_once __DIR__."/../src/Course.php";
    require_once __DIR__."/../src/Student.php";

    class CourseTest extends PHPUnit_Framework_TestCase
    {
    //     protected function tearDown()
    //    {
    //        Course::deleteAll();
    //        Student::deleteAll();
    //    }

       function test_getId()
       {
           //Arrange
           $course_number = "HIS100";
           $course_name = "History 100";
           $test_course = new Course($course_number, $course_name);

           //Act
           $result = $test_course->getId();

           //Assert
           $this->assertEquals(null, $result);
       }

       function test_getCourseNumber()
       {
           //Arrange
           $course_number = "HIS100";
           $course_name = "History 100";
           $test_course = new Course($course_number, $course_name);

           //Act
           $result = $test_course->getCourseNumber();

           //Assert
           $this->assertEquals("HIS100", $result);
       }

       function test_getCourseName()
       {
           //Arrange
           $course_number = "HIS100";
           $course_name = "History 100";
           $test_course = new Course($course_number, $course_name);

           //Act
           $result = $test_course->getCourseName();

           //Assert
           $this->assertEquals("History 100", $result);
       }

       function test_setCourseNumber()
       {
           //Arrange
           $course_number = "HIS100";
           $course_name = "History 100";
           $test_course = new Course($course_number, $course_name);

           $new_course_number = "HIS101";

           //Act
           $test_course->setCourseNumber($new_course_number);
           $result = $test_course->getCourseNumber();

           //Assert
           $this->assertEquals("HIS101", $result);
       }

       function test_setCourseName()
       {
           //Arrange
           $course_number = "HIS100";
           $course_name = "History 100";
           $test_course = new Course($course_number, $course_name);

           $new_course_name = "History 101";

           //Act
           $test_course->setCourseName($new_course_name);
           $result = $test_course->getCourseName();

           //Assert
           $this->assertEquals("History 101", $result);
       }




//End Test`
    }
?>
