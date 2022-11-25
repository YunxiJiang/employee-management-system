/* Performance table */

INSERT INTO `Performance`(
    `employee_id`,
    `award_name`,
    `award_id`
)
VALUES(
    213, 
    'Precious Gem Award', 
    311
),(
    213, 
    'Superstar Award', 
    312
),(
    214, 
    'Prime Player Award', 
    313
),(
    215, 
    'Shining Star Award', 
    314
),(
    null, 
    'Cloud Collaborator', 
    315
),(
    216, 
    'Pinnacle Performer', 
    316
),


/* Employee table */
INSERT INTO `Employee`(
    `id`,
    `name`,
    `email`,
    `phone_number`,
    `gender`,
    `date_of_birth`,
    `department`,
    `salary`,
    `award_id`
)
VALUES(
    211,
    'Tom',
    'tom@gmail.com',
    '353877111111',
    'male',
    '1999-1-1',
    'Software Engineer',
    10000,
    NULL
),(
    212,
    'Alice',
    'Alice@gmail.com',
    '353877111112',
    'female',
    '1999-1-2',
    'Software Engineer',
    20000,
    NULL
),(
    213,
    'James',
    'James@gmail.com',
    '353877111113',
    'male',
    '1999-1-3',
    'Cloud Engineer',
    20000,
    311
),(
    214,
    'James',
    'James@gmail.com',
    '353877111113',
    'male',
    '1999-1-3',
    'Cloud Engineer',
    20000,
    313
),(
    215,
    'Robert',
    'Robert@gmail.com',
    '353877111114',
    'male',
    '1999-1-4',
    'Cloud Engineer',
    20000,
    314
),
(
    216,
    'John',
    'John@gmail.com',
    '353877111115',
    'male',
    '1999-1-5',
    'Java Engineer',
    20000,
    316
),(
    216,
    'David',
    'David@gmail.com',
    '353877111116',
    'male',
    '1999-1-6',
    'Java Engineer',
    20000,
    null
),
(
    217,
    'William',
    'William@gmail.com',
    '353877111117',
    'male',
    '1999-1-7',
    'Web Engineer',
    10000,
    null
),
(
    217,
    'Richard',
    'Richard@gmail.com',
    '353877111118',
    'male',
    '1999-1-8',
    'Web Engineer',
    10000,
    213
)


/* Admin table */
INSERT INTO `Admin`(
    `id`,
    `name`,
    `email`,
    `phone_number`,
    `gender`,
    `date_of_birth`,
    `department`
)
VALUES(
    111,
    'Tom',
    'tom@gmail.com',
    '353877111111',
    'male',
    '1999-1-1',
    'Software Engineer'
);