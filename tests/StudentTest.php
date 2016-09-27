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

        //End Test`
    }
?>
