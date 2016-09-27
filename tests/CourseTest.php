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
        protected function tearDown()
        {
            Course::deleteAll();
            Student::deleteAll();
        }

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

        function test_save()
        {
            //Arrange
            $course_number = "HIS100";
            $course_name = "History 100";
            $test_course = new Course($course_number, $course_name);

            //Act
            $test_course->save();
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$test_course], $result);
        }

        function test_getAll()
        {
            //Arrange
            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $course_number2 = "HIS101";
            $course_name2 = "History 101";
            $test_course2 = new Course($course_number2, $course_name2);
            $test_course2->save();

            //Act
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$test_course1, $test_course2], $result);
        }

        function test_findById()
        {
            //Arrange
            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $course_number2 = "HIS101";
            $course_name2 = "History 101";
            $test_course2 = new Course($course_number2, $course_name2);
            $test_course2->save();

            // Act
            $search_id = $test_course2->getId();
            $result = Course::findById($search_id);

            // Assert
            $this->assertEquals($test_course2, $result);
        }

        function test_delete()
        {
            //Arrange
            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            // Act
            $test_course1->delete();
            $result = Course::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $new_course_name = "History 1000";
            $test_course1->setCourseName($new_course_name);

            //Act
            $test_course1->update();
            $result = Course::getAll();

            //Assert
            $this->assertEquals([$test_course1], $result);
        }

//End Test`
    }
?>
