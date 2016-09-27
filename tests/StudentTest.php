<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../inc/ConnectionTest.php";
    require_once __DIR__."/../src/Course.php";
    require_once __DIR__."/../src/Student.php";

    class StudentTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Course::deleteAll();
            Student::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-12-2015";
            $id = 5;
            $test_student = new Student($name, $enrollment_date, $id);

            //Act
            $result = $test_student->getId();

            //Assert
            $this->assertEquals($id, $result);

        }

        function test_getName()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-12-2015";
            $id = 5;
            $test_student = new Student($name, $enrollment_date, $id);

            //Act
            $result = $test_student->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getEnrollmentDate()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-12-2015";
            $id = 5;
            $test_student = new Student($name, $enrollment_date, $id);

            //Act
            $result = $test_student->getEnrollmentDate();

            //Assert
            $this->assertEquals($enrollment_date, $result);
        }

        function test_setName()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-12-2015";
            $id = 5;
            $test_student = new Student($name, $enrollment_date, $id);

            //Act
            $new_name = "Johnny Miller";
            $test_student->setName($new_name);
            $result = $test_student->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_setEnrollmentDate()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-12-2015";
            $id = 5;
            $test_student = new Student($name, $enrollment_date, $id);

            //Act
            $new_enrollment_date = "04-13-2015";
            $test_student->setEnrollmentDate($new_enrollment_date);
            $result = $test_student->getEnrollmentDate();

            //Assert
            $this->assertEquals($new_enrollment_date, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "John Miller";
            $enrollment_date = "04-24-2015";
            $test_student = new Student($name, $enrollment_date);

            //Act
            $test_student->save();
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$test_student], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $name2 = "Steve Johnson";
            $enrollment_date2 = "04-25-2014";
            $test_student2 = new Student($name2, $enrollment_date2);
            $test_student2->save();

            //Act
            Student::deleteAll();
            $result = Student::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_getAll()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $name2 = "Steve Johnson";
            $enrollment_date2 = "04-25-2014";
            $test_student2 = new Student($name2, $enrollment_date2);
            $test_student2->save();

            //Act
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$test_student1, $test_student2], $result);
        }

        function test_delete()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            //Act
            $test_student1->delete();
            $result = Student::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_update()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $new_name = "John Smith";
            $test_student1->setName($new_name);

            //Act
            $test_student1->update();
            $result = Student::getAll();

            //Assert
            $this->assertEquals([$test_student1], $result);
        }

        function test_getCourseList()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $course_number2 = "HIS101";
            $course_name2 = "History 101";
            $test_course2 = new Course($course_number2, $course_name2);
            $test_course2->save();

            //Act
            $test_student1->addToCourseList($test_course1);
            $test_student1->addToCourseList($test_course2);
            $result = $test_student1->getCourseList();

            //Assert
            $this->assertEquals([$test_course1, $test_course2] , $result);
        }



        function test_addToCourseList()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            //Act
            $test_student1->addToCourseList($test_course1);
            $result = $test_student1->getCourseList();

            //Assert
            $this->assertEquals([$test_course1], $result);
        }

        function test_deleteCourseList()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $course_number2 = "HIS101";
            $course_name2 = "History 101";
            $test_course2 = new Course($course_number2, $course_name2);
            $test_course2->save();
            $test_student1->addToCourseList($test_course1);
            $test_student1->addToCourseList($test_course2);

            //Act
            $test_student1->deleteCourseList();
            $result = $test_student1->getCourseList();

            //Assert
            $this->assertEquals([] , $result);
        }

        function test_deleteFromCourseList()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $course_number1 = "HIS100";
            $course_name1 = "History 100";
            $test_course1 = new Course($course_number1, $course_name1);
            $test_course1->save();

            $course_number2 = "HIS101";
            $course_name2 = "History 101";
            $test_course2 = new Course($course_number2, $course_name2);
            $test_course2->save();
            $test_student1->addToCourseList($test_course1);
            $test_student1->addToCourseList($test_course2);

            //Act
            $test_student1->deleteFromCourseList($test_course2);
            $result = $test_student1->getCourseList();

            //Assert
            $this->assertEquals([$test_course1] , $result);
        }

        function test_findById()
        {
            //Arrange
            $name1 = "John Miller";
            $enrollment_date1 = "04-24-2015";
            $test_student1 = new Student($name1, $enrollment_date1);
            $test_student1->save();

            $name2 = "Steve Johnson";
            $enrollment_date2 = "04-25-2014";
            $test_student2 = new Student($name2, $enrollment_date2);
            $test_student2->save();


            //Act
            $search_id = $test_student2->getId();
            $result = Student::findById($search_id);

            //Assert
            $this->assertEquals($test_student2, $result);
        }


        //End Test
    }
?>
