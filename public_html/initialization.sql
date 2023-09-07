-- Drop tables in reverse order of creation
DROP TABLE Gives;
DROP TABLE Attends;
DROP TABLE Works;
DROP TABLE Has_Role;
DROP TABLE Company;
DROP TABLE Completes;
DROP TABLE Certification;
DROP TABLE Connected_to;
DROP TABLE Joins;
DROP TABLE Community;
DROP TABLE Includes;
DROP TABLE Hashtag;
DROP TABLE Create_Post;
DROP TABLE Has_Program;
DROP TABLE Professional;
DROP TABLE Student;
DROP TABLE School;
DROP TABLE Users;
DROP TABLE Location;


-- Create tables in proper order
CREATE TABLE Location (
    city CHAR(20),
    province CHAR(20),
    country CHAR(20),
    PRIMARY KEY (city, province)
);

CREATE TABLE Users (
    name CHAR(20),
    accountID INTEGER,
    email CHAR(20) UNIQUE,
    phone INTEGER UNIQUE,
    city CHAR(20),
    province CHAR(20),
    PRIMARY KEY (accountID),
    FOREIGN KEY (city, province) REFERENCES Location(city, province)
);

CREATE TABLE School (
    schoolID INTEGER,
    school_name CHAR(20),
    school_city CHAR(20),
    school_province CHAR(20),
    PRIMARY KEY (schoolID),
    FOREIGN KEY (school_city, school_province) REFERENCES Location(city, province)
);

CREATE TABLE Student (
    GPA FLOAT,
    student_accountID INTEGER PRIMARY KEY,
    year INTEGER,
    FOREIGN KEY (student_accountID) REFERENCES Users(accountID) ON DELETE CASCADE
);

CREATE TABLE Professional (
    professional_accountID INTEGER PRIMARY KEY,
    expertise CHAR(40),
    FOREIGN KEY (professional_accountID) REFERENCES Users(accountID) ON DELETE CASCADE
);

CREATE TABLE Has_Program (
    program_name CHAR(20),
    faculty CHAR(20),
    schoolID INTEGER,
    PRIMARY KEY (program_name, faculty, schoolID),
    FOREIGN KEY (schoolID) REFERENCES School(schoolID) ON DELETE CASCADE
);

CREATE TABLE Create_Post (
    post_date CHAR(20),
    postID INTEGER PRIMARY KEY,
    post_type CHAR(20),
    post_text CHAR(1000),
    accountID INTEGER NOT NULL,
    FOREIGN KEY (accountID) REFERENCES Users(accountID) ON DELETE CASCADE
);

CREATE TABLE Hashtag (
    label CHAR(20) PRIMARY KEY,
    usageNum INTEGER
);

CREATE TABLE Includes (
    postID INTEGER,
    label CHAR(20),
    PRIMARY KEY (label, postID),
    FOREIGN KEY (label) REFERENCES Hashtag(label),
    FOREIGN KEY (postID) REFERENCES Create_Post(postID) ON DELETE CASCADE
);

CREATE TABLE Community (
    community_name CHAR(20) PRIMARY KEY,
    dateCreated CHAR(20)
);

CREATE TABLE Joins (
    community_name CHAR(20),
    accountID INTEGER,
    join_date CHAR(20),
    PRIMARY KEY (community_name, accountID),
    FOREIGN KEY (accountID) REFERENCES Users(accountID) ON DELETE CASCADE,
    FOREIGN KEY (community_name) REFERENCES Community(community_name) ON DELETE CASCADE
);

CREATE TABLE Connected_to (
    accountID1 INTEGER,
    accountID2 INTEGER,
    PRIMARY KEY (accountID1, accountID2),
    FOREIGN KEY (accountID1) REFERENCES Users(accountID) ON DELETE CASCADE,
    FOREIGN KEY (accountID2) REFERENCES Users(accountID) ON DELETE CASCADE
);

CREATE TABLE Certification (
    certificate_name CHAR(20),
    courseNum INTEGER,
    PRIMARY KEY (certificate_name, courseNum)
);

CREATE TABLE Completes (
    certificate_name CHAR(20),
    courseNum INTEGER,
    accountID INTEGER,
    completion_date CHAR(20),
    PRIMARY KEY (certificate_name, courseNum, accountID),
    FOREIGN KEY (accountID) REFERENCES Users(accountID) ON DELETE CASCADE,
    FOREIGN KEY (certificate_name, courseNum) REFERENCES Certification(certificate_name, courseNum) ON DELETE CASCADE
);

CREATE TABLE Company (
    company_name CHAR(20),
    company_city CHAR(20),
    PRIMARY KEY (company_name, company_city)
);

CREATE TABLE Has_Role (
    roleID INTEGER,
    company_city CHAR(20),
    company_name CHAR(20),
    salary INTEGER,
    title CHAR(20),
    PRIMARY KEY (roleID, company_city, company_name),
    FOREIGN KEY (company_name, company_city) REFERENCES Company(company_name, company_city)
);

CREATE TABLE Works (
    professional_accountID INTEGER,
    roleID INTEGER,
    company_name CHAR(20),
    company_city CHAR(20),
    start_day CHAR(20),
    PRIMARY KEY (professional_accountID, roleID, company_name, company_city),
    FOREIGN KEY (professional_accountID) REFERENCES Professional(professional_accountID) ON DELETE CASCADE,
    FOREIGN KEY (roleID, company_city, company_name) REFERENCES Has_Role(roleID, company_city, company_name) ON DELETE CASCADE
);

CREATE TABLE Attends (
    schoolID INTEGER,
    faculty CHAR(20),
    start_day CHAR(20),
    program_name CHAR(20),
    student_accountID INTEGER NOT NULL,
    PRIMARY KEY (schoolID, student_accountID, faculty, program_name),
    FOREIGN KEY (program_name, faculty, schoolID) REFERENCES Has_Program(program_name, faculty, schoolID) ON DELETE CASCADE,
    FOREIGN KEY (student_accountID) REFERENCES Users(accountID) ON DELETE CASCADE
);

CREATE TABLE Gives (
    certificate_name CHAR(20),
    courseNum INTEGER,
    company_name CHAR(20),
    company_city CHAR(20),
    PRIMARY KEY (certificate_name, courseNum, company_name, company_city),
    FOREIGN KEY (certificate_name, courseNum) REFERENCES Certification(certificate_name, courseNum) ON DELETE CASCADE,
    FOREIGN KEY (company_name, company_city) REFERENCES Company(company_name, company_city) ON DELETE CASCADE
);

-- LOCATION INSERTS

INSERT INTO Location (city, province, country)
VALUES ('New York', 'NY', 'USA');

INSERT INTO Location (city, province, country)
VALUES ('Los Angeles', 'CA', 'USA');

INSERT INTO Location (city, province, country)
VALUES ('Chicago', 'IL', 'USA');

INSERT INTO Location (city, province, country)
VALUES ('Houston', 'TX', 'USA');

INSERT INTO Location (city, province, country)
VALUES ('Phoenix', 'AZ', 'USA');

INSERT INTO Location (city, province, country)
VALUES ('Vancouver', 'BC', 'Canada');

INSERT INTO Location (city, province, country)
VALUES ('Toronto', 'ON', 'Canada');

-- USERS INSERT

-- STUDENTS
INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('John Doe', 1, 'jdoe@example.com', 1234567890, 'New York', 'NY');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Jane Smith', 2, 'jsmith@example.com', 9876543210, 'Los Angeles', 'CA');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Michael Johnson', 3, 'mjohnson@example.com', 5555555555, 'Chicago', 'IL');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Emily Davis', 4, 'edavis@example.com', 1111111111, 'Houston', 'TX');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Robert Wilson', 5, 'robertw@example.com', 9999999999, 'Phoenix', 'AZ');

-- PROFESSIONALS
INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Emma Jones', 6, 'ejones@example.com', 2222222222, 'Los Angeles', 'CA');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('David Thomas', 7, 'dthomas@example.com', 3333333333, 'Vancouver', 'BC');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Sarah Jackson', 8, 'sjackson@example.com', 4444444444, 'Los Angeles', 'CA');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('James Brown', 9, 'jbrown@example.com', 6666666666, 'Chicago', 'IL');

INSERT INTO Users (name, accountID, email, phone, city, province)
VALUES ('Alice Martin', 10, 'amartin@example.com', 7777777777, 'Chicago', 'IL');

-- SCHOOL INSERTS

INSERT INTO School (schoolID, school_name, school_city, school_province)
VALUES (11111111, 'University of ABC', 'New York', 'NY');

INSERT INTO School (schoolID, school_name, school_city, school_province)
VALUES (22222222, 'University of XYZ', 'Los Angeles', 'CA');

INSERT INTO School (schoolID, school_name, school_city, school_province)
VALUES (33333333, 'University of QRS', 'Chicago', 'IL');

INSERT INTO School (schoolID, school_name, school_city, school_province)
VALUES (44444444, 'University of MNO', 'Houston', 'TX');

INSERT INTO School (schoolID, school_name, school_city, school_province)
VALUES (55555555, 'University of PQR', 'Phoenix', 'AZ');

-- STUDENT INSERTS

INSERT INTO Student (GPA, student_accountID, year)
VALUES (1.5, 1, 3);

INSERT INTO Student (GPA, student_accountID, year)
VALUES (4.0, 2, 4);

INSERT INTO Student (GPA, student_accountID, year)
VALUES (3.2, 3, 2);

INSERT INTO Student (GPA, student_accountID, year)
VALUES (3.9, 4, 4);

INSERT INTO Student (GPA, student_accountID, year)
VALUES (3.6, 5, 1);

-- PROFESSIONAL INSERTS

INSERT INTO Professional (professional_accountID, expertise)
VALUES (6, 'Software Development');

INSERT INTO Professional (professional_accountID, expertise)
VALUES (7, 'Marketing');

INSERT INTO Professional (professional_accountID, expertise)
VALUES (8, 'Finance');

INSERT INTO Professional (professional_accountID, expertise)
VALUES (9, 'Human Resources');

INSERT INTO Professional (professional_accountID, expertise)
VALUES (10, 'Data Analysis');

-- HAS_PROGRAM INSERTS

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Computer Science', 'Science', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Biology', 'Science', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Finance', 'Business', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Marketing', 'Business', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Accounting', 'Business', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Mech Engineering', 'Engineering', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Elec Engineering', 'Engineering', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Physics', 'Engineering', 11111111);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Psychology', 'Arts', 11111111);


INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Finance', 'Business', 22222222);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Marketing', 'Business', 22222222);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Accounting', 'Business', 22222222);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Mech Engineering', 'Engineering', 33333333);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Elec Engineering', 'Engineering', 33333333);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Physics', 'Engineering', 33333333);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Psychology', 'Arts', 44444444);

INSERT INTO Has_Program (program_name, faculty, schoolID)
VALUES ('Biology', 'Science', 55555555);

-- CREATE_POST INSERTS

INSERT INTO Create_Post (post_date, postID, post_type, post_text, accountID)
VALUES ('2023-06-30', 1, 'Article', 'Based on recent studies Social Networking Database Management has appeared in more than 10000 searches in just 10 minutes, making it the most successful project in history!', 3);

INSERT INTO Create_Post (post_date, postID, post_type, post_text, accountID)
VALUES ('2023-06-20', 2, 'Photo', 'This is the book I recently read. It was a 10/10 read, definetly recommend.', 2);

INSERT INTO Create_Post (post_date, postID, post_type, post_text, accountID)
VALUES ('2023-06-20', 3, 'Video', 'This is a video of Abdel rizzing (he failed)', 7);

INSERT INTO Create_Post (post_date, postID, post_type, post_text, accountID)
VALUES ('2023-06-20', 4, 'Article', 'This article targets the topic of climate change. Climate change is bad. Thank you.', 4);

INSERT INTO Create_Post (post_date, postID, post_type, post_text, accountID)
VALUES ('2023-06-20', 5, 'Photo', 'This is Kevin (Keviiiiin)', 8);

-- HASHTAG INSERTS

INSERT INTO Hashtag (label, usageNum)
VALUES ('technology', 10);

INSERT INTO Hashtag (label, usageNum)
VALUES ('fashion', 5);

INSERT INTO Hashtag (label, usageNum)
VALUES ('finance', 3);

INSERT INTO Hashtag (label, usageNum)
VALUES ('travel', 8);

INSERT INTO Hashtag (label, usageNum)
VALUES ('food', 6);

-- INCLUDES INSERTS

INSERT INTO Includes (postID, label)
VALUES (1, 'technology');

INSERT INTO Includes (postID, label)
VALUES (2, 'fashion');

INSERT INTO Includes (postID, label)
VALUES (3, 'travel');

INSERT INTO Includes (postID, label)
VALUES (4, 'food');

INSERT INTO Includes (postID, label)
VALUES (5, 'technology');

INSERT INTO Includes (postID, label)
VALUES (5, 'fashion');

-- COMMUNITY INSERTS

INSERT INTO Community (community_name, dateCreated)
VALUES ('Tech Enthusiasts', '2023-01-01');

INSERT INTO Community (community_name, dateCreated)
VALUES ('Fashionistas', '2023-02-01');

INSERT INTO Community (community_name, dateCreated)
VALUES ('Finance Gurus', '2023-03-01');

INSERT INTO Community (community_name, dateCreated)
VALUES ('Travel Lovers', '2023-04-01');

INSERT INTO Community (community_name, dateCreated)
VALUES ('Foodies', '2023-05-01');

-- JOINS INSERTS

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Tech Enthusiasts', 1, '2023-01-02');

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Finance Gurus', 1, '2023-01-02');

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Fashionistas', 2, '2023-02-03');

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Finance Gurus', 3, '2023-03-04');

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Travel Lovers', 4, '2023-04-05');

INSERT INTO Joins (community_name, accountID, join_date)
VALUES ('Foodies', 5, '2023-05-06');

-- CONNECTED_TO INSERTS

INSERT INTO Connected_to (accountID1, accountID2)
VALUES (1, 2);

INSERT INTO Connected_to (accountID1, accountID2)
VALUES (2, 3);

INSERT INTO Connected_to (accountID1, accountID2)
VALUES (3, 4);

INSERT INTO Connected_to (accountID1, accountID2)
VALUES (4, 5);

INSERT INTO Connected_to (accountID1, accountID2)
VALUES (5, 1);

-- CERTIFICATION INSERTS

INSERT INTO Certification (certificate_name, courseNum)
VALUES ('Java', 101);

INSERT INTO Certification (certificate_name, courseNum)
VALUES ('Marketing', 201);

INSERT INTO Certification (certificate_name, courseNum)
VALUES ('Finance', 301);

INSERT INTO Certification (certificate_name, courseNum)
VALUES ('HR', 401);

INSERT INTO Certification (certificate_name, courseNum)
VALUES ('Data Analysis', 501);

-- COMPLETES INSERTS

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('Java', 101, 1, '2023-06-20');

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('Marketing', 201, 1, '2023-06-22');

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('Marketing', 201, 2, '2023-06-20');

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('Finance', 301, 3, '2023-06-20');

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('HR', 401, 4, '2023-06-20');

INSERT INTO Completes (certificate_name, courseNum, accountID, completion_date)
VALUES ('Data Analysis', 501, 5, '2023-06-20');

-- COMPANY INSERTS

INSERT INTO Company (company_name, company_city)
VALUES ('ABC Corporation', 'New York');

INSERT INTO Company (company_name, company_city)
VALUES ('ABC Corporation', 'Vancouver');

INSERT INTO Company (company_name, company_city)
VALUES ('ABC Corporation', 'Toronto');

INSERT INTO Company (company_name, company_city)
VALUES ('XYZ Industries', 'Los Angeles');

INSERT INTO Company (company_name, company_city)
VALUES ('QRS Enterprises', 'Chicago');

INSERT INTO Company (company_name, company_city)
VALUES ('MNO Solutions', 'Houston');

INSERT INTO Company (company_name, company_city)
VALUES ('PQR Technologies', 'Phoenix');

-- HAS_ROLE INSERTS

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (1, 'New York', 'ABC Corporation', 150000, 'Software Engineer');

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (1, 'Vancouver', 'ABC Corporation', 90000, 'Software Engineer');

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (2, 'Los Angeles', 'XYZ Industries', 60000, 'Marketing Manager');

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (3, 'Chicago', 'QRS Enterprises', 170000, 'Finance Analyst');

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (4, 'Houston', 'MNO Solutions', 80000, 'HR Manager');

INSERT INTO Has_Role (roleID, company_city, company_name, salary, title)
VALUES (5, 'Phoenix', 'PQR Technologies', 90000, 'Data Analyst');

-- WORKS INSERTS

INSERT INTO Works (professional_accountID, roleID, company_name, company_city, start_day)
VALUES (6, 1, 'ABC Corporation', 'New York', '2023-06-01');

INSERT INTO Works (professional_accountID, roleID, company_name, company_city, start_day)
VALUES (7, 2, 'XYZ Industries', 'Los Angeles', '2023-06-02');

INSERT INTO Works (professional_accountID, roleID, company_name, company_city, start_day)
VALUES (8, 2, 'XYZ Industries', 'Los Angeles', '2023-06-02');

INSERT INTO Works (professional_accountID, roleID, company_name, company_city, start_day)
VALUES (9, 3, 'QRS Enterprises', 'Chicago', '2023-06-02');

INSERT INTO Works (professional_accountID, roleID, company_name, company_city, start_day)
VALUES (10, 1, 'ABC Corporation', 'Vancouver', '2023-06-02');

-- ATTENDS INSERTS

INSERT INTO Attends (schoolID, faculty, start_day, program_name, student_accountID)
VALUES (11111111, 'Science', '2023-06-03', 'Computer Science', 1);

INSERT INTO Attends (schoolID, faculty, start_day, program_name, student_accountID)
VALUES (22222222, 'Business', '2023-06-04', 'Marketing', 2);

INSERT INTO Attends (schoolID, faculty, start_day, program_name, student_accountID)
VALUES (11111111, 'Science', '2023-09-01', 'Biology', 3);

INSERT INTO Attends (schoolID, faculty, start_day, program_name, student_accountID)
VALUES (22222222, 'Business', '2023-09-01', 'Finance', 4);

INSERT INTO Attends (schoolID, faculty, start_day, program_name, student_accountID)
VALUES (33333333, 'Engineering', '2023-09-01', 'Elec Engineering', 5);

-- GIVES INSERTS

INSERT INTO Gives (certificate_name, courseNum, company_name, company_city)
VALUES ('Finance', 301, 'ABC Corporation', 'New York');

INSERT INTO Gives (certificate_name, courseNum, company_name, company_city)
VALUES ('Java', 101, 'PQR Technologies', 'Phoenix');

INSERT INTO Gives (certificate_name, courseNum, company_name, company_city)
VALUES ('Marketing', 201, 'QRS Enterprises', 'Chicago');

INSERT INTO Gives (certificate_name, courseNum, company_name, company_city)
VALUES ('Java', 101, 'QRS Enterprises', 'Chicago');

INSERT INTO Gives (certificate_name, courseNum, company_name, company_city)
VALUES ('Marketing', 201, 'XYZ Industries', 'Los Angeles');
