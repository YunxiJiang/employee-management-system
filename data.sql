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
    NULL
),(
    214,
    'James',
    'James@gmail.com',
    '353877111113',
    'male',
    '1999-1-3',
    'Cloud Engineer',
    20000,
    NULL
),(
    215,
    'Robert',
    'Robert@gmail.com',
    '353877111114',
    'male',
    '1999-1-4',
    'Cloud Engineer',
    20000,
    NULL
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
    NULL
),(
    217,
    'David',
    'David@gmail.com',
    '353877111116',
    'male',
    '1999-1-6',
    'Java Engineer',
    20000,
    NULL
),
(
    218,
    'William',
    'William@gmail.com',
    '353877111117',
    'male',
    '1999-1-7',
    'Web Engineer',
    10000,
    NULL
),
(
    219,
    'Richard',
    'Richard@gmail.com',
    '353877111118',
    'male',
    '1999-1-8',
    'Web Engineer',
    10000,
    NULL
);


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
    'Thomas',
    'Thomas@gmail.com',
    '353877112111',
    'male',
    '1999-2-1',
    'Software Engineer'
),(
    112,
    'Charles',
    'Charles@gmail.com',
    '353877112112',
    'male',
    '1999-2-2',
    'Computer Training'
),(
    113,
    'Christopher',
    'Christopher@gmail.com',
    '353877112113',
    'female',
    '1999-2-3',
    'Operations Support'
),(
    114,
    'Daniel',
    'Daniel@gmail.com',
    '353877112114',
    'male',
    '1999-2-4',
    'Machine Learning'
),(
    115,
    'Matthew',
    'Matthew@gmail.com',
    '353877112115',
    'male',
    '1999-2-5',
    ''
),(
    116,
    'Anthony',
    'Anthony@gmail.com',
    '353877112116',
    'male',
    '1999-2-6',
    ' Network application'
),(
    117,
    'Mark',
    'Mark@gmail.com',
    '353877112117',
    'male',
    '1999-2-7',
    'Software Engineer'
);