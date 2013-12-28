CREATE TABLE SurveyInfo (
survey_id int unsigned auto_increment primary key,
user_id int unsigned,
name varchar(50),
description varchar(100)
);


CREATE TABLE SurveyQuestions (
survey_id int unsigned,
question_number int unsigned,
question_type varchar(1000),
question varchar(1000),
option1 varchar(1000), 
option2 varchar(1000),
option3 varchar(1000),
option4 varchar(1000),
option5 varchar(1000)
);

CREATE TABLE SurveyAnswers (
survey_id int unsigned,
question_number int unsigned,
ans varchar(1000), 
ip_address varchar(16)
);
