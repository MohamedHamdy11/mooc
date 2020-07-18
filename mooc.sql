SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mooc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mooc` ;

-- -----------------------------------------------------
-- Table `mooc`.`users_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`users_groups` (
  `group_id` INT NOT NULL AUTO_INCREMENT ,
  `group_name` VARCHAR(250) NOT NULL ,
  PRIMARY KEY (`group_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(200) NOT NULL ,
  `password` VARCHAR(200) NOT NULL ,
  `email` VARCHAR(200) NOT NULL ,
  `image` VARCHAR(200) NULL ,
  `user_group` INT NOT NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `UsersUserGroupsId` (`user_group` ASC) ,
  CONSTRAINT `UsersUserGroupsId`
    FOREIGN KEY (`user_group` )
    REFERENCES `mooc`.`users_groups` (`group_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`courses_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`courses_categories` (
  `category_id` INT NOT NULL AUTO_INCREMENT ,
  `category_name` VARCHAR(200) NOT NULL ,
  `created_by` INT NOT NULL ,
  PRIMARY KEY (`category_id`) ,
  INDEX `CoursesCategoriesuserId` (`created_by` ASC) ,
  CONSTRAINT `CoursesCategoriesuserId`
    FOREIGN KEY (`created_by` )
    REFERENCES `mooc`.`users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`courses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`courses` (
  `course_id` INT NOT NULL AUTO_INCREMENT ,
  `course_title` VARCHAR(250) NOT NULL ,
  `course_description` TEXT NOT NULL ,
  `course_cover` VARCHAR(200) NOT NULL ,
  `course_instructor` INT NOT NULL ,
  `course_category` INT NOT NULL ,
  PRIMARY KEY (`course_id`) ,
  INDEX `CoursesUserId` (`course_instructor` ASC) ,
  INDEX `CoursesCoursesCategoriesId` (`course_category` ASC) ,
  CONSTRAINT `CoursesUserId`
    FOREIGN KEY (`course_instructor` )
    REFERENCES `mooc`.`users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CoursesCoursesCategoriesId`
    FOREIGN KEY (`course_category` )
    REFERENCES `mooc`.`courses_categories` (`category_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`courses_lessons`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`courses_lessons` (
  `lessons_id` INT NOT NULL AUTO_INCREMENT ,
  `lessons_title` VARCHAR(250) NOT NULL ,
  `lessons_description` TEXT NOT NULL ,
  `lessons_cover` VARCHAR(200) NULL ,
  `lessons_video` VARCHAR(200) NOT NULL ,
  `lessons_instructor` INT NOT NULL ,
  `lessons_course` INT NOT NULL ,
  PRIMARY KEY (`lessons_id`) ,
  INDEX `CoursesLessonsUsersId` (`lessons_instructor` ASC) ,
  INDEX `CoursesLessonsCoursesId` (`lessons_course` ASC) ,
  CONSTRAINT `CoursesLessonsUsersId`
    FOREIGN KEY (`lessons_instructor` )
    REFERENCES `mooc`.`users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CoursesLessonsCoursesId`
    FOREIGN KEY (`lessons_course` )
    REFERENCES `mooc`.`courses` (`course_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`courses_lessons_comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`courses_lessons_comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT ,
  `comment_title` VARCHAR(250) NOT NULL ,
  `comment_content` TEXT NOT NULL ,
  `comment_lesson` INT NOT NULL ,
  `comment_user` INT NOT NULL ,
  PRIMARY KEY (`comment_id`) ,
  INDEX `CoursesLessonsCommentsUsersId` (`comment_user` ASC) ,
  INDEX `CoursesLessonsCommentslessonsId` (`comment_lesson` ASC) ,
  CONSTRAINT `CoursesLessonsCommentsUsersId`
    FOREIGN KEY (`comment_user` )
    REFERENCES `mooc`.`users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CoursesLessonsCommentslessonsId`
    FOREIGN KEY (`comment_lesson` )
    REFERENCES `mooc`.`courses_lessons` (`lessons_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mooc`.`courses_students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mooc`.`courses_students` (
  `course_id` INT NOT NULL ,
  `student_id` INT NOT NULL ,
  `approved` TINYINT(1) NULL ,
  PRIMARY KEY (`course_id`, `student_id`) ,
  INDEX `CoursesStudentsUsersId` (`student_id` ASC) ,
  INDEX `CoursesStudentsCoursesId` (`course_id` ASC) ,
  CONSTRAINT `CoursesStudentsUsersId`
    FOREIGN KEY (`student_id` )
    REFERENCES `mooc`.`users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CoursesStudentsCoursesId`
    FOREIGN KEY (`course_id` )
    REFERENCES `mooc`.`courses` (`course_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
