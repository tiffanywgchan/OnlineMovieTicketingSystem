--Author: Tiffany Chan (10181522) & Spencer Delaney (10178519)
--Class: CISC332 Project for OMTS database
--Final DML

create database omtsdb;

CREATE TABLE Users (
    accountNum INTEGER NOT NULL,
    password VARCHAR(50) NOT NULL,
    streetNumber VARCHAR(25) NOT NULL,
    streetName VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    postalCode CHAR(6) NOT NULL,
    phoneNum INTEGER NOT NULL,
    email VARCHAR(64) NOT NULL,
    creditNum INTEGER NOT NULL,
    expiryDate CHAR(4) NOT NULL,
    PRIMARY KEY(accountNum),
  );

CREATE TABLE Complex (
  name VARCHAR(50) NOT NULL,
  numTheatres INTEGER NOT NULL,
  streetNumber VARCHAR(25) NOT NULL,
  streetName VARCHAR(100) NOT NULL,
  city VARCHAR(100) NOT NULL,
  postalCode CHAR(6) NOT NULL,
  phoneNum INTEGER NOT NULL,
  PRIMARY KEY(name),
  FOREIGN KEY(accountNum) REFERENCES Users(accountNum)
);

CREATE TABLE Theatre (
  num INTEGER NOT NULL,
  seats INTEGER NOT NULL,
  screenSize VARCHAR(6) NOT NULL
  streetNumber VARCHAR(25) NOT NULL,
  streetName VARCHAR(100) NOT NULL,
  city VARCHAR(100) NOT NULL,
  potalCode CHAR(6) NOT NULL,
  PRIMARY KEY(num),
  FOREIGN KEY(name) REFERENCES Complex(name),
  FOREIGN KEY(title) REFERENCES Movie(title)
);

CREATE TABLE Movie (
  title VARCHAR(100) NOT NULL,
  runtime INTEGER NOT NULL,
  rating VARCHAR(3) NOT NULL,
  synopsis VARCHAR(1024) NOT NULL,
  director VARCHAR(50) NOT NULL,
  company VARCHAR(100) NOT NULL,
  supplier VARCHAR(100) NOT NULL,
  startDate INTEGER NOT NULL,
  endDate INTEGER NOT NULL,
  sales VARCHAR(12),
  PRIMARY KEY(title),
  FOREIGN KEY(num) REFERENCES Theatre(num),
  FOREIGN KEY(supplier) REFERENCES Supplier(companyName)
);

CREATE TABLE Actors (
  title VARCHAR(100) NOT NULL,
  fName VARCHAR(30) NOT NULL,
  lName VARCHAR(30) NOT NULL,
  PRIMARY KEY(title, fname, lname),
  FOREIGN KEY(title) REFERENCES Movie(title)
);

CREATE TABLE Supplier (
  companyName VARCHAR(100) NOT NULL,
  streetNumber VARCHAR(25) NOT NULL,
  streetName VARCHAR(100) NOT NULL,
  city VARCHAR(100) NOT NULL,
  postalCode CHAR(6) NOT NULL,
  phone INTEGER NOT NULL,
  contactName VARCHAR(100) NOT NULL,
  PRIMARY KEY(companyName)
);

CREATE TABLE Showing (
  theatreNum INTEGER NOT NULL,
  startTime INTEGER NOT NULL,
  seatsLeft INTEGER, NOT NULL,
  PRIMARY KEY(theatreNum),
  FOREIGN KEY(title) REFERENCES Movie(title)
  FOREIGN KEY(accountNum) REFERENCES Users(accountNum)
);

CREATE TABLE NumTickets (
  accountNum INTEGER NOT NULL,
  theatreNum INTEGER NOT NULL,
  numTickets INTEGER NOT NULL,
  PRIMARY KEY(accountNum,theatreNum),
  FOREIGN KEY(accountNum) REFERENCES Users(accountNum),
  FOREIGN KEY(theatreNum) REFERENCES Showing(theatreNum)
);

CREATE TABLE ReviewContent (
  accountNum INTEGER NOT NULL,
  title VARCHAR(100) NOT NULL,
  content VARCHAR(1024) NOT NULL,
  PRIMARY KEY(accountNum, title),
  FOREIGN KEY(accountNum) REFERENCES Users(accountNum),
  FOREIGN KEY(title) REFERENCES Movie(title)
);

INSERT INTO Complex values
('SilverCity Cineplex', 3, '90A', 'Silver Dr', 'Mississauga', 'L4M0E8',9058582789),
('Courtney Park Cineplex',2, '2048', 'Courtney Dr',' Mississauga', 'L2K9E8', 9058291839),
('Odensmith Cineplex', 3, '78', 'John Counter Blvd', 'Kingston', 'K2L1E9', 6138910284),
('Landshark Cinemas', 3, '120', 'Dalton Ave', 'Kingston', 'K7L3E4', 6132948779),
('Screening Room', 2, '120' 'Princess St', 'Kingston', 'K2L4E5', 6132992546),
('AMC Cinemas', 2, '334', 'Winston Churchill St', 'Oakville', 'L3M5E9', 9058583938),
('Cine Starz', 4, '337', 'Burnhamthrope Rd', 'Mississauga', 'L5A3Y1', 9052902401);

INSERT INTO Theatre values
(1, 400,'large', '2048', 'Courtney Dr', 'Mississauga', 'L2K9E8'),
(2, 250, 'small', '120', 'Dalton Ave', 'Kingston', 'K7L3E4'),
(3, 500, 'large', '334', 'Winston Churchill St', 'Oakville', 'L3M5E9'),
(4, 350, 'medium', '337', 'Burnhamthrope Rd', 'Mississauga', 'L5A3Y1'),
(5, 200, 'medium', '78', 'John Counter Blvd', 'Kingston', 'K2L1E9'),
(6, 400, 'large', '90A', 'Silver Dr', 'Mississauga', 'L4M0E8'),
(7, 375, 'large', '2048', 'Courtney Dr', 'Mississauga', 'L2K9E8'),
(8, 190, 'small', '120', 'Princess St', 'Kingston', 'K2L4E5'),
(9, 325, 'medium', '78', 'John Counter Blvd', 'Kingston', 'K2L1E9'),
(10, 385, 'large', '2048', 'Courtney Dr', 'Mississauga', 'L2K9E8'),
(11, 200, 'small', '120', 'Princess St', 'Kingston', "K2L4E5"),
(12, 308, 'large', '90A', 'Silver Dr', 'Mississauga', 'L4M0E8'),
(13, 200, 'small', '120', 'Dalton Ave', 'Kingston', 'K7L3E4'),
(14, 315, 'medium', '337', 'Burnhamthrope Rd', 'Mississauga', 'L5A3Y1'),
(15, 465, 'medium', '78', 'John Counter Blvd', 'Kingston', 'K2L1E9'),
(16, 490, 'large', '334', 'Winston Churchilll St', 'Oakville', 'L3A5E9'),
(17, 425, 'large', '90A', 'Silver Dr', 'Mississauga', 'L4M0E8'),
(18, 245, 'small', '120', 'Dalton Ave', 'Kingston', 'K7L3E4'),
(19, 215, 'medium', '337', 'Burnhamthrope Rd', 'Mississauga', 'L5A3Y1');

INSERT INTO Supplier values
('Universal', '4234', 'Hollywood Blvd', 'Toronto', 'L5M3I9', 9058293849, 'John Smith'),
('Fox', '1029', 'Alpaca Ave', 'Vancouver', 'R8E0G2', 3239867742, 'Leah Lee'),
('Warner Brothers', '100', 'Kent Dr', 'Toronto', 'L2M5R3', 6479304837, 'Lance Arm'),
('CBC', '204', 'Generation Dr', 'San Diego', 'P0E8G8', 2938286728, 'Han Solo'),
('Paramount Pictures', '800', 'Footstomp Ave', 'Boston', 'W9R8F8', 'Jordan Pettyjon'),
('Colombia Pictures', '586', 'King St', 'Ottawa', 'R3G9T5', 'Candy Lolo'),
('Sony', '214', 'Queen St', 'Brockvegas', 'F8E0G8', 'Diane Delanski');

INSERT INTO Movie values
('Shape of Water', 123, 'PG', 'Lady falls in love with a fishman', 'Guillermo del Toro', 'TSG Entertainment', 'Fox', 11122017, 24012018, 400),
('Get Out', 104, 'R', 'Man goes to town with girlfriend and things go array', 'Jordan Peele', 'QC Entertainment', 'Universal', 14022017, 24042017, 600),
('Transformers', 153, '14A', 'Teen gets new car that turns out to be an alien', 'Christopher Nolan', 'Angry Films', 'Paramount Pictures', 16052016, 01062016, 489),
('Ready Player One', 140, 'G', 'In 2045, much of Earths population centers have become slum-like cities due to overpopulation, pollution, corruption, and climate change. To escape their desolation, people engage in the virtual reality world of the OASIS', 'Steven Spielberg', 'Village Shows', 'Warner Brothers', 22032018, 20042018, 790),
('Tomb Raider', 118, 'PG', 'Lara Croft is fierce and indepent and goes on a dangerous adventure to uncover her fathers secrets', 'Roar Uthaug', 'Just Kidding', 'Sony', 01082017, 01092017, 332),
('Love Simon', 110, 'PG', 'Teen named Simon faces the aftermath of coming out that he is gay', 'Greg Berlanti', 'Tackle Boom', 'Sony', 22032018, 15042018, 541),
('Black Panther', 120,'14A', 'TChalla, after the death of his father, the King of Wakanda, returns home to the isolated, technologically advanced African nation to succeed to the throne and take his rightful place as king', 'Ryan Coogler', 'Marvel Studios', 'Universal', 13022018, 17042018, 729),
('Peter Rabbit', 90, 'G', 'Mischievous and adventurous hero who has captivated generations of readers, now takes on the starring role of his own irreverent, contemporary comedy with attitude.', 'Will Gluck', 'Funny R Us', 'CBC', 01062018, 01072018, 0),
('Red Sparrow', 141, 'R', 'When ballerina Dominika suffers a career-ending injury, she and her mother are facing a bleak and uncertain future.', 'Francis Lawrence', 'Scary Gooer', 'Fox', 10232017, 11242017, 696),
('Wrinkle In Time', 122, 'G', 'Meg Murry and her little brother, Charles Wallace, have been without their scientist father, Mr. Murry, for five years, ever since he discovered a new planet and used the concept known as a tesseract to travel there.', 'Disney', 'Colombia Pictures', 14032018, 10042018, 556),
('Avengers Infinity War', 124,'AA', 'Thanos attacks earth and it is up to the Avengers to fight and defend the human race.', 'Joss Whedon', 'Marvel Studios', 'Universal', 27042018, 30052018, 832),
('Sherlock Holmes', 138, '14A', 'Notorious detection Sherlock Holmes uses his smart skills to solve mysterious cases', 'Lenny Dawg', 'FedOx', 'Fox', 19022018, 09032018, 742),
('Thor Ragnorok', 132, '14A', 'Superhero Thor is sent to a desolate planet where he placed into combat for entertainment', 'George Gawkins', 'Soaring Flights', 'Warner Brothers', 13052017, 16062017, 461),
('Pitch Perfect', 119, 'G', 'A group of girls who love to sing but cannot play any instruments form an accapella group and compete', 'Quintin Lox','Jenkins Inc', 'Sony', 31042018, 25052018, 588),
('Superman', 124, 'AA', 'Man from another planet lands on earth as a baby and as he grows up, learns more about where he comes from and the power he has', 'Peter Piper', 'Motion Picture', 'CBC', 08082015, 09092015, 863),
('Limitless', 118, '14A', 'If you could take a pill that makes you invinsible, would you take it?', 'Ron Dwight', 'Kicken', 'Colombia Pictures', 30052016, 14062016, 789),
('Moana', 114, 'G', 'A girl discovers her mystical connection with the sea and helps a god', 'John Wit', 'Menotrack', 'Sony', 21082017, 09102017, 814),
('Jurassic World', 125, '14A', 'At a theme park where dinosaurs have become the norm for entertainment, what happens when they genetically mutate one?', 'Kat Ree', 'Overcatch', 'Universal', 30092018, 24112018, 0),
('John Wick', 136, 'R', 'A group of bad men kill his dog, so this man with specific skills will go lengths to avenge his puppers death', 'Lucio Killa', 'Clipboards', 'Colombia Pictures', 31052017, 23062017, 901),
('Ted', 120, 'R', 'As a child, a man wishes his teddy bear is real. His wish comes true and they grow up together', 'Nathan Wence', 'Anders', 'Warner Brothers', 02042018, 03052018, 0),
('Friends with Benefits', 134, 'R', 'Mix friends and sex together and you will get a relationship', 'Grayston Keele', 'Never Stop', 'CBC', 28012018, 30022018, 845),
('21 Jump Street', 118, '14A', 'Two terrible cops go undercover to infitrate the dealer in order to find the supplier', 'Summer Bet', 'Sony', 03092015, 24122015, 738),
('Begin Again', 110, 'AA', 'A man who is a failing producer meets a failing singer. Together they are great for each other', 'Ana Kendrick', 'Blue Bag', 'Paramount Pictures', 23012019, 19022019, 0);

INSERT INTO Users values
(5327957122, 'abc123', '53', 'Johnson St', 'Kingston', 'K7L2T5', 6135983987, 'sk8terboi@hotmail.com', 5191305873371489, 1118),
(2980578390, 'lol23!', '9932', 'Centre St', 'Kingston', 'K7L4E6', 6093890765, 'blitz@gmail.com', 9026784987623456, 0819),
(2915738978, 'funnypass32', '899', 'Toronto St', 'Kingston', 'K9L3E0', 6139872648, 'johnyboi@hotmail.ca', 6334770023730671, 1218),
(5328697382, 'lokkey22'), '292', 'Edgehill Rd', 'Kingston', 'K2L4T3', 6138908489, 'edgykid@gmail.com', 2928908719523478, 1219),
(2827591839, 'mbokey2!', '5511', 'Haddon Hall Rd', 'Mississauga', 'L5M5G6', 9058583729, 'fruitcup_180@hotmail.com', 49382789378, 0218),
(1375948492, 'slurpey', '2903', 'MiddleBury Rd', 'Oakville', 'L2K3H5', 6473898476, 'greymount234@gmail.com', 294820482476, 1119),
(1083481784, 'iloveyoujenny', '21', 'Thomas St', 'Mississauga', 'L3A9E8', 6478927736, 'georgiojenkins@hotmail.com', 182478902632, 0418),
(3238423443, '974ever1', '4228', 'King St', 'Brockville', 'K3E8B9', 6138028184, 'pepperkats@sympatico.ca', 18294128453, 0518),
(5717374723, 'bestiam', '23B', 'Dallas Rd', 'Kingston', 'K3L4T9', 6138927738, 'tissueblankets@cogeco.ca', 292948294428, 0618),
(1473874747, 'beastmode1!', '9920', 'Georgia Blvd', 'Kingston', 'K3L6E9', 6278983844, 'butterfly22@hotmail.ca', 532900371959, 0419),
(2828473274, 'madmoneyz', '291', 'Bankfield Rd', 'Belleville', 'K9L8G7', 6297738421, 'moonman@hotmail.com', 883921738921, 0919),
(1573728482, 'peterpiper532', '2321', 'River Rd', 'Mississauga', 'L8G9E6', 4167821908, 'strongneck@queensu.ca', 901241820122, 0118),
(1298375727, 'kittyJoeyLuv!', '78E', 'Field Cres', 'Kingston', 'K8G7D6', 6182948274, 'greyhair@sympatico.ca', 382717482210, 0820),
(5727364829, 'penmaster31$', '99', 'Tickle Ave', 'Brockville', 'K5G6E8', 6138829177, 'brickroad@cogeco.ca', 281748298172, 0921),
(2838374828, 'DaddyNeedsShoes920', '44C', 'Headtrust Rd', 'Arora', 'K8G7D9S', 6138948322, 'blackhawk@cogeco.ca', 838327185921, 1118),
(1838473749, 'oreoluver53', '41', 'Quill Ave', 'Odessa', 'K3W9G0', 6178828490, 'dabmaster@hotmail.ca', 3819572891, 0425),
(1578482323, 'databaseyo19', '908', 'Peacoat Blvd', 'Kingston', 'K7G9D9', 7389994871, 'margaritaville@gmail.ca', 3819771888, 0820),
(5748484838, 'password12', '66D', 'Blackmere Ave', 'Mississauga', 'L5M3E9', 1824467892, 'laundrysuckz@cogeco.ca', 3847581924, 1219),
(4719283472, 'Welcome1!', '3245', 'Lolly Rd', 'Oakville', 'L3M8G9', 6127329982, 'addiyaas@rogers.com', 8382734156, 1023),
(2938472893, 'VladimirPoutine', '193', 'Abeth Cres', 'Mississauga', 'L9G8D7', 90583817283, 'applecore_2412@hotmail.ca', 9328153234, 0520);

INSERT INTO Showing values
(1, 1305, 50),
(2, 2130, 24),
(4, 1745, 70),
(9, 1525, 57),
(3, 1520, 100),
(15, 1935, 451),
(19, 2045, 139),
(5, 1250, 40),
(11, 1505, 67),
(16, 1830, 228),
(7, 2135, 108),
(14, 1905, 98),
(17, 1630, 233);

INSERT INTO numTickets values
(1473874747, 19, 3),
(5327957122, 1, 2),
(2838374828, 5, 2),
(1083481784, 7, 4),
(4719283472, 2, 6),
(2938472893, 3, 1),
(5328697382, 8, 2);

INSERT INTO ReviewContent values
(5327957122, 'Shape of Water', 'Great music in the movie and really got my fins tingling!'),
(5327957122, 'Get Out', 'Had me jumping out of my seat and contains a strong message'),
(1838473749, 'John Wick'),
(5717374723, 'Pitch Perfect'),
(5328697382, 'Sherlock Holmes'),
(5328697382, 'Ready Player One'),
(2938472893, 'Jurassic World'),
(2827591839, 'Love Simon'),
(1298375727, 'Black Panther', );
