<?php

$conn = new mysqli("localhost", "root", "");
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$drop = "DROP DATABASE IF EXISTS seniorProject";
if ($conn->query($drop) === TRUE) {
    echo "Database Dropped. ";
} else {
    echo "Error Dropping DB: " . $conn->error;
}

$DB = "CREATE DATABASE seniorProject";
$conn->query($DB);

$using = "USE seniorProject";
$conn->query($using);

$table = "CREATE TABLE msstate(
ID int NOT NULL PRIMARY KEY,
LibraryName varchar(255),
City varchar(64),
Country varchar(64),
Website varchar(255),
ManuscriptName varchar(255),
Author varchar(64),
BirthDate varchar(32),
DeathDate varchar(32),
Notes varchar(255),
OorC varchar(10)
)";
$conn->query($table);


$table = "CREATE TABLE theW(
ID int NOT NULL PRIMARY KEY,
Institution varchar(255),
CollectionTitle varchar(255),
InstCollNum varchar(16),
InclusiveDates varchar(32),
Extent varchar(32),
SubjectHeadings varchar(64),
Descriptions varchar(10000),
Link varchar(255),
Notes varchar(255)
)";
$conn->query($table);

$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(1,'Bibliothek','Bern','Switzerland',NULL,'Epitoma de Pontificibus Romanis','Abbo Floriacensis',945,1004,'None','Original');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(2,'Universiteitsbibiotheek','Leiden','Netherlands',NULL,'Epitoma de Pontificibus Romanis','Abbo Floriacensis',945,1004,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(3,'Bibliothèque Nationale','Paris','France',NULL,'Bella Parisiacae urbis','Abbo of St. Germain',850,925,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(4,'Österreichische Nationalbibliothek','Wien','Austria',NULL,'Abbreviatio Chronicae a Mundo Condito usque ad Carolum Magnum','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(5,'Österreichische Nationalbibliothek','Wien','Austria',NULL,'Abbreviatio Chronicae ab Adamo usque ad Annum 809','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(6,'Bibliothèque Nationale','Paris','France',NULL,'Abbreviatio Chronicae Bedanae','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(7,'British Library','London','England',NULL,'Abbreviatio de Gestis Normannorum ad Gulielmum I Regem Angliae','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(8,'Bibliothèque Nationale','Paris','France',NULL,'Abbreviatio Gestorum Regum Francorum (Historia Francorum Monasterii Sancti Dionysii)','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(9,'Newberry Library','Chicago','United States of America',NULL,'Abbreviationes Chronicorum','Unknown',NULL,NULL,'None','Copy');";
$conn->query($query);
$query = "INSERT INTO msstate(ID,LibraryName,City,Country,Website,ManuscriptName,Author,BirthDate,DeathDate,Notes,OorC) VALUES(10,'Universitäts und Landesbibliothek','Halle','Germany',NULL,'Vita Heinrici II Imperatoris','Adalboldus Utraiectensis',695,1580,'None','Original');";
$conn->query($query);

$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (1,'Jackson State University - Margaret Walker Center','Adrienne, Alberta Collection','AF 043','1970s','1 linear foot','African American History','This collection consists of printed materials, newspapers, and magazines detailing the events that took place during the 1970s at Jackson State College. It also contains humanities course teaching material.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/adrienne.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (2,'Jackson State University - Margaret Walker Center','Alexander, Margaret Walker Personal Papers','AF 012','1929-1998','110 linear feet','African American History','These papers consist of materials dating from 1929-1998 that Alexander created, received, and collected during her lifetime (1915-1998). The materials include correspondence; journals; creative works by Alexander and others; subject files; printed material; financial and legal documents; serials; scrapbooks; clippings; video recordings; photographic materials; books by and about African Americans; plaques; and framed items.','http://www.jsums.edu/margaretwalkercenter/files/2013/05/Finding-Aid.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (3,'Jackson State University - Margaret Walker Center','Bates, Gladys Noel Scrapbook','AF 018','1924-1995','.42 linear feet',NULL,'Presented by Gladys Noel Bates of Denver, Colorado, her collection consists of correspondence, scrapbooks with photographs, newspapers clippings of her and her family, and the Mississippi Journal.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/bates.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (4,'Jackson State University - Margaret Walker Center','Coney, Melvene L. Collection','AF 029','1989-2002',NULL,'African American History','Coney was the assistant secretary of the state board of directors for the National Council of Negro Women; a life-member and recording secretary of Delta Sigma Theta Sorority, Inc.; an active member of New Hope Baptist Church; and a member of the board for the Margaret Walker Alexander National Research Center.   She died August 9, 2003, after a long bout with cancer. This collection includes memorabilia documenting her life and work.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/coney.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (5,'Jackson State University - Margaret Walker Center','Jones, Lillie Bell Walker Collection','AF 008','1925-1994','2 linear feet','African American History','A graduate of Jackson College, Walker first worked at Jim Hill for eight years. She further studied at the University of Chicago and the University of Connecticut. She was employed at the YWCA for thirty years and was also instrumental in the building of the $250, 000 facility on Farish Street in 1965. This collection consists of materials dating from 1925 to 1994 explaining Walker?s career as a teacher and administrator. It includes correspondence, personal papers, administrative records, and photographs.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/jones.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (6,'Jackson State University - Margaret Walker Center','McCalip, Amanda Collection','AF 022',NULL,'1 linear foot',NULL,'This collection consists of a scrapbook of quotes from McCalip?s grandmother. It was donated to the Alexander Center by McCalip after a class project in December 1996.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/mccalip.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (7,'Jackson State University - Margaret Walker Center','Patton, Howard and Bennie Collection','AF 045','1944-1990','.84 linear feet','World War II','Howard and Bennie Mae Patton married shortly before World War and Mr. Howard Patton spent the last years of the war, 1944-1945 stationed primarily in the Pacific Theater. After the war, the couple settled in Dayton, Ohio.','http://www.jsums.edu/margaretwalkercenter/files/2014/08/Howard-and-Bennie-Patton-Personal-Papers.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (8,'Jackson State University - Margaret Walker Center','Powell, Freida and John Collection','AF 006','1949-1990',NULL,NULL,'The papers of the Powell family consist of materials dated from 1949 to the 1990s, including correspondence, personal records, subject files, programs, newspaper clippings, legal documents, serials, plaques, and photographs.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/powell.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (9,'Jackson State University - Margaret Walker Center','Thompson, Cleopatra D. and Hazeal M. Collection','AF 005','1895-1992','12.5 linear feet','African American History ; Politics','The collection contains correspondence, reports, photographs, notes, pamphlets,scrapbooks, newspaper clippings, notebooks, minutes, membership list and other papersprimarily documenting the political and social activities of the Thompsons. Noted arematerials relative to The Mississippi Teacher Association, Delta Sigma Thea Sorority,American Church Institute for Negroes, Farish Street BaptistChurch, Atlanta University, Tougaloo College, Alcorn State University, Jackson StateUniversity, Cornell University and Liberia','http://www.jsums.edu/margaretwalkercenter/files/2013/03/thompson.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (10,'Jackson State University - Margaret Walker Center','Turner, Maggie Little Collection','AF 013','1901-1992','4.04 linear feet',NULL,'Turner was affiliated with many civic and community organizations.  She was an active member of Sigma Gamma Rho Sorority, Inc.; the League of Women Voters; Church Women United; Mary Church Terrell Literary Club; the Metropolitan Mississippi and National Retired Teachers? Associations; the American Association of Retired Persons; the State Federation of Colored Women?s Clubs; and the National Baptist Convention, USA.  She was a lifetime member of the Alcorn State University National Alumni Association.  The papers of Maggie Little Turner span the years 1901-1992, with the bulk of the material concentrated in the years 1969-1989.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/turner.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (11,'Jackson State University - Margaret Walker Center','WomanPower Unlimited Collection','AF 004','1946-1976','.42 linear feet','African American History','The Womenpower Unlimited papers consist of photocopies of varies aspects of the organization.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/wpu.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (12,'Jackson State University - Margaret Walker Center','Woodard, Eva Y. Collection',NULL,'1958-1964','.42 linear feet',NULL,'The museum collection covers the educational activities of Eva Yancy Woodard. Items include an article from the Journal of Home Economics and twenty photographs with students from her home economics classroom.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (13,'Jackson State University - Margaret Walker Center','Woodard, Melita A.W. Collection','AF 014','1927-1987','.63 linear feet',NULL,'This collection consists of materials created and received by Woodard in 1927, 1933, 1972, and 1987. The materials include obituaries, certificates, and photographs.','http://www.jsums.edu/margaretwalkercenter/files/2013/03/woodard.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (14,'Jackson State University - Margaret Walker Center','Gold Coast Oral Histories',NULL,NULL,NULL,'African American History','The Gold Coast oral history collection is currently comprised of one oral history with Mrs. Billie O. Stamps Fuller, the widow of the owner of the Stamps Hotel, located in what was known as the Gold Coast outside Jackson, where black celebrities visited and performed.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (15,'Jackson State University - Margaret Walker Center','Good Old Days Oral Histories',NULL,NULL,NULL,NULL,'This project is a recollection of the ?Good Old Days? by senior citizens who talk about their lives, times, achievements, and challenges from their early childhood through the various stages of life.','http://www.jsums.edu/margaretwalkercenter/files/2013/06/good_old_days-finding-aid.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (16,'Jackson State University - Margaret Walker Center','Labor as an Instrument of Social Change Oral Histories',NULL,NULL,NULL,NULL,'This collection currently consists of 54 interviews that detail the influence of the labor movement on civil rights. It examines the reciprocal impact of education, employment, professionals, professional and academic organizations and institutions on social change in Jackson, Mississippi.','http://www.jsums.edu/margaretwalkercenter/files/2013/06/labor-finding-aid.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (17,'Jackson State University - Margaret Walker Center','Women of Courage/ Women''s Issues Oral Histories',NULL,'1975-1997',NULL,NULL,'This collection focuses on how black church women united, how black women campaigned for jobs in Jackson, and how black women organized other social, political, and economic activities. It deals with growing up as a woman, opportunities and challenges, female perspectives on American events and issues, and the accomplishments of courageous and outstanding women.','http://www.jsums.edu/margaretwalkercenter/files/2013/06/women_of_courage-finding-aid.pdf',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (18,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Bolding, Sally Collection',NULL,NULL,NULL,'Agriculture and Rural Life','The Sally Bolding Collection consists of photos of the Edward Hill Family, and other miscellaneous other photos, including her father?s rice operation and irrigation. It contains copies of portions of Mrs. Bolding?s books, unproofed dust jacket and a leather pouch inscribed ?JEP Hill?s private papers?.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (19,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Castle, Gladys C. Collection','M256','1926-1986','3 cubic feet','African American History','The Gladys Castle Collection contains documents and photographs during Miss Castle?s long tenure at Delta State University.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (20,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Cruse, Sue Gordon Collection','M276','1925-1941','.5 cubic feet','Journalism','The Sue Gordon Cruse Collection contains 31 Commercial Appeal newspapers ranging in dates from 1925 to 1941.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (21,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Daughters of the American Revolution Collection','M230','1931-1998','2.5 cubic feet',NULL,'This collection contains the yearbooks, annual proceedings, reports, and magazines of the DAR during the period 1931 through 1999.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (22,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Delta Kapa Gamma, Iota Chapter Collection','M198','1963-1965','1.67 linear feet',NULL,'This collection contains one scrapbook of the Delta kappa Gamma, Iota Chapter during the period 1963 ? 1965.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (23,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Erwin, Cora Scrapbook','M023','1928','.45 cubic feet',NULL,'This collection contains a scrapbook that belonged to Cora Erwin, a 1928 graduate of Delta State Teachers College.  The scrapbook contains information specific to that particular year and includes photos and comments from her friends.  It lists class colors, class officers, and class members.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (24,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Erwin, Emily Collection','M210',NULL,'1.76 linear feet',NULL,'The Emily Erwin collection consists largely of the Erwin Family Genealogy, but also a 1949 issue of ?Life? Magazine, stereo view card of a cotton picking scene on a southern farm.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (25,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Fioranelli Collection','M206','1979-1994','.30 cubic feet','Arts and Culture','This collection contains news clippings from local newspaper which features local cooks and their recipes, including the candy business of Vicki Fioranelli.  The collection also contains a cookbook of Delta area rice recipes that was compiled by local residents.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (26,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Graves, Florence Carson Letters','M003','1883-1886','12 letters','Civil War','Personal letters to Florence Carson Graves from her father James Graves and one letter from her sister?s sister-in-law Harriet Warfield Bell. These letters give a description of family life in Natchez in the 1880?s.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (27,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Gibert-Knowlton-Lytle Family Papers','M113','1871-2000',NULL,'Arts and Culture','Collection contains personal correspondence, photographs, and memoribillia from the Gibert-Knowlton-Lytle Family. Collection also contains the art papers of Emma Lytle, noted Delta artist. 1871 ? 2000',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (28,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Holbrook Family Collection','M221','1949-1992','.05 cubic feet','Journalism','These papers contain the life story of Eliza Jane Poitevent Holbrook the first newspaper woman in the State of Mississippi.  She wrote poetry under the pen name ?Pearl Rivers.?  The papers came from Delta State University?s Language and Literature Class (Elizabeth Sarcone).',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (29'Delta State University - Charles W. Capps, Jr. Archives and Museum','Holcombe, Maxine Boggan Papers','M123','1950-1994','2 cubic feet','Arts and Culture','The Maxine Boggan Holcombe papers contain numerous photo albums, certificates, awards, and poetry during the period of time that Mrs. Holcome taught art at Delta State and co-chaired the Delta State Art Department.  The Holcombe-Norwood Art Annex is partially named for her.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (30,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Howorth, Lucy Somerville Collection','M103','1867-1999','43 cubic feet','Politics ; Civil Rights','Lucy Somerville Howorth (1895 ? 1997) from Greenville, Mississippi became the first female to serve in the Mississippi Legislature.She was appointed as a judge and served on several national boards advocating civil rights for minorities and women. Collecion contains personal and professional papers of Lucy Somerville Howorth. 1940 ? 1997',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (31,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Kamien Collection','M243','1923-1999','2 cubic feet',NULL,'Papers and information from four generations of the Kamien Family make up this collection. The collection contains genealogical information, educational programs, news clippings of community theatre and other civic events, awards and certificates, Exchange Club and Rotary Club Charter information, Rotary booklets and bulletins, Cleveland Garden Club, Delta Garden Club yearbooks, and a record album collection.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (32,'Delta State University - Charles W. Capps, Jr. Archives and Museum','McLean, Mrs. Keith Dockery Collection','M190','1888-2002','.05 cubic feet','World War II ; Politics','This collection contains the writings of Mrs. Keith Frazier Somerville.  Mrs. Somerville wrote for The Bolivar Commercial during World War II to the servicemen in a series called ?Dear Boys.?  She also documents her life, including the period that her father was the Governor of Tennessee.  The collection contains other writings, including a book that she wrote, and miscellaneous correspondence and some photos of the Delta at sunset.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (33,'Delta State University - Charles W. Capps, Jr. Archives and Museum','McMillen, Dr. Edith Cameron Collection','M197','1850-2000','1.25 linear feet',NULL,'The Dr. Edith Cameron McMillen Collection contains various old magazines, medical related handbooks and menus',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (34,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Myles, Harriet Clark Daybooks','M014','1868-1891','.25 cubic feet',NULL,'This collection contains photocopies of the daybooks of Harriet Clark Myles.  It details the day-to-day home events during the period 1868 to 1891',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (35,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Nott Family History','M135','1868-','.25 cubic feet',NULL,'This collection contains the family history of Edward Joseph Nott and Maude Alice Gray Nott, originally from Illinois who married and moved to Cleveland, Mississippi in 1902.  They were parents to five daughters.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (36,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Nugent, Lily Warfield Collection','M013','1888-1930','.25 cubic feet',NULL,'This collection contains 1888 personal correspondence and manuscripts written by Lily Warfield Nugent.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (37,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Ogden, Florence Sillers Papers','M017','1860-1972','22.45 cubic feet','Journalism ; Agriculture and Rural Life ; Politics','Florence Siller Ogden (1897-1972) was the daughter of Walter Sillers, Sr. She wrote the ?Dis & Dat? columns for the Delta Star in Greenville and the Clarion Ledger. Clippings and articles concern state and national politics and agriculture. 1935-1971, 1860-1861.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (38,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Pharis, Alice Sullivan Collection','M260','1957','.35 cubic feet','Arts and Culture','The Alice Sullivan Pharis Collection contains photos and news clippings of Delta State?s dance troupe, the Delta Belles.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (39,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Rhoden, Naomi Collection','M218','1967-2001','.025 cubic feet',NULL,'The Naomi Rhoden Collection contains news clippings of Jewish Holidays, a poem written by Mrs. Rhoden, and miscellanous clippings related to her love of sunflowers.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (40,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Sillers, Florence W Collection','M002','1884-1956','5.04 cubic feet',NULL,'Florence Warfield Sillers was the daughter of Colonel Elisha and Mary Carson Warfield and marrried Walter Sillers, a lawyer and planter of Rosedale.  Florence was devoted to civic organizations, and founded the Bolivar County Daughters of American Revolution, and was responsible for the printed history for Bolivar County.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (41,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Somerville, Nellie Nugent Lecture Series','M063','1974-1989','.25 cubic feet','Arts and Culture','This collection contains information about the establishment of the Nellie Nugent Somerville Lecture Series and programs of subsequent annual lectures.  It also contains remarks and tapes of some of the lectures.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (42,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Thompson, Virginia Collection','M066',NULL,NULL,NULL,'Virginia Thompson served as secretary to the president during the 1940s and 1950s. The collection consists of written correspondence, newspaper clippings, photographs, and a small number of miscellaneous items relating to the lives of the faculty, staff, and students of Delta State Teachers College. 1930s-1950s','http://collections.msdiglib.org/digital/collection/dsu/search/searchterm/M66%20Virginia%20Thompson%20Papers/field/all/mode/exact/conn/or/order/nosort',NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (43,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Tidwell, Mrs. Jimmie Collection','M203','1923-1997','1.34 linear feet','Religious Institutions/Religious Life','This collection contains detailed geneological information on the Leon Kamien family, born 1852 in Poland.  It also contains several First Baptist Church of Cleveland church directories, history of the King?s Daughters and Sons, Lawrence Welk photo album, and bicentennial copies of newspapers and other miscellaneous items.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (44,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Tonos, Billie Rossie Collection','M213','1945-1977','.417 linear feet',NULL,'The Billie Rossie Tonos Collection contains memorabilia from her days as a Delta State student, including photos, programs from class plays, plays and manuscripts, news articles, and personal correspondence.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (45,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Valentine, Jonett Collection','M171','1886-2002','2.5 linear feet',NULL,'The Jonett Valentine Collection contains portions of various newspapers and information and a VHS in the Bolivar County Ice Storm 1994, a railroad spike, a book on Cleveland?s History 1886 ? 1986, a pictoral history of the governor?s mansion, a book of the history of Mississippi libraries and various other printed material and miscellaneous items, including public grade school workbooks that belonged to her mother.  It contains DSU related information about President Lucas, homecoming program, alumni directories.  It also contains pageants by Miss Ethel Cain put on by the Delta State Physical Education Department.  Also included are newspaper clippings relating to the establishment of the Peavine Awards and recipients, programs and flyers from the Peavine Awards.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (46,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wade, Margaret Collection','M105','1972-1985','1 cubic feet',NULL,'Items pertaining to Ms. Wade and her basketball coaching career at Delta State. 1972-1979',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (47,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Walt, Rebecca Dilmman Diary','M121','1854-1857','1.8 cubic feet','Religious Institutions/Religious Life','This collection contains photocopies of the diary of Rebecca Dillman Walt during the period 1854 to 1857.  The diary chronicles the everyday life of an upper middle class woman of the mid 1800?s.  She describes her sewing, visiting, attending church, and her readings on self-improvement and religion.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (48,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Warfield, Mary Carson Collection','M015','1860-1919','.05 cubic feet','Civil War','The Mary Carson Warfield Papers includes a Civil War Commission for her husband, Elisha Warfield, Certificate of Membership for Mary Carson Warfiled to the United Daughters of the Confederacy, unpublished novels, and personal correspondence.  Her daughter was Florence Warfield Sillers, wife of Walter Sillers of Rosedale.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (49,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Ward, Lyde Carson Scrapbook','M008','1875-1900','.50 cubic feet',NULL,'This collection consists of a scrapbook that belonged to Mrs. Lyde Carson Ward, sister of Mary Carson Warfield.  The scrapbook consists of news articles collected over a period 1875 to 1900, many from the St. Louis Republic.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (50,'Delta State University - Charles W. Capps, Jr. Archives and Museum','West Delta Chapter of the American Red Cross',NULL,'1917-2007','20 cubic feet',NULL,'The West Delta Chapter of the American Red Cross Papers contains the reports, minutes, news clippings, photographs and other documents of the organization headquartered in Greenville, MS.  It also contains the history of the chapter, including information about its directors and key members, as well as disaster work information and fund raising events.  There is also information about the Gray Ladies and Red Cross hospital recreation activities across the United States and Japan collected by Miss Hazel Breland, who served Red Cross for many years.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (51,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wiggins Papers','M133','1943-1946','.0025 cubic feet','World War II','The Wiggins Papers consist of cards and letters written mainly from military personnel to Mrs. Sylvia Wiggins during the war.',NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (52,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Dong, Fay and Juanita','OH 228',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (53,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Kit Gong, Bobbie Gore, Joy Gore, Amy Gore, and Billie Gore',NULL,NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (54,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Gong, Penney Cheung','OH 247',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (55,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Joe, Edward and Annette','OH 230',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (56,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Jue, Bobby and Laura','OH 231',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (57,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Kossman, S.E. (Juliet)','OH 232',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (58,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Lee, Freeda and Hoover','OH 235',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (59'Delta State University - Charles W. Capps, Jr. Archives and Museum','Quon, Frieda','OH 237',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (60,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Sidney, Dr. Audrey','OH 238',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (61,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wing, Luck and Mae','OH 239',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (62,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wong, Frances','OH 242',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (63,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Woo, Eddie and Shirley','OH 240',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (64,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Woo, Lillie','OH 241',NULL,NULL,'Chinese Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (65,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Palmer, Loretta','OH 365',NULL,NULL,'Delta Black Farmers Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (66,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Ball, Sarah Lee','OH 244',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (67,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Delap, Betty','OH 273',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (68,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Howorth, Judge Lucy S.','OH 339 ; OH 340 ; OH 341',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (69'Delta State University - Charles W. Capps, Jr. Archives and Museum','Kaplan, Charlotte','OH 251',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (70,'Delta State University - Charles W. Capps, Jr. Archives and Museum','King, Sue','OH 253',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (71,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Leftwich, Mary Ellen','OH 254',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (72,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Miller, Martha','OH 255',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (73,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Richardson, Alyce','OH 258',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (74,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Ruscoe, Ann Bishop','OH 259',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (75,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Sanders, Captain Viola','OH 260',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (76,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Seaberry, Lucy Hutton','OH 261',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (77,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Stewart, Luisa Harris','OH 263',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (78,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Tonos, Billie Rossie','OH 266',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (79,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Walters, Dr. Eleanor','OH 269',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (80,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wyatt, Janice','OH 271',NULL,NULL,'Delta State University Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (81,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Fioranelli, Vicki','OH 181',NULL,NULL,'Delta Food Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (82,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Scarbough, Dorothy Grady','OH 178',NULL,NULL,'Delta Food Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (83,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Steen, Ann','OH 179',NULL,NULL,'Delta Food Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (84,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Williams, Shirley','OH 182',NULL,NULL,'Delta Food Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (85,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Borgognoni, Elizabeth','OH 221',NULL,NULL,'Italian Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (86,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Cascio, Darlene','OH 227',NULL,NULL,'Italian Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (87,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Cefalu, Ida',NULL,NULL,NULL,'Italian Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (88,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Mei, Amerina','OH 226',NULL,NULL,'Italian Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (89,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Venuti, Grace','OH 226',NULL,NULL,'Italian Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (90,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Ballard, Erma','OH 207',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (91,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Brown, Jane','Oh 208',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (92,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Cox, Bea','OH 209',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (93,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Latham, Sue','OH 211',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (94,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Miller, Betty','OH 215',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (95,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Strain, Martha','OH 217',NULL,NULL,'German POW Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (96,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Adams, Signe Mrs.','OH 376',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (97,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Dossett, Mrs. Mary G (Mimi)','OH 386',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (98,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Dunlap, Mrs. Jane','OH 372',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (99,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Funchess, Noel and Lynelle','OH 370',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (100'Delta State University - Charles W. Capps, Jr. Archives and Museum','Lucas, Mrs. Jenny','OH 377',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (101,'Delta State University - Charles W. Capps, Jr. Archives and Museum','McCaleb, Mrs. Donna','OH 381',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (102,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Moore, Mrs. Julia','OH 379',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (103,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Povall, Mrs. Hilda','OH 387',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (104,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Rayner, Clay and Virginia','OH 373',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (105,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Shaman, Mrs. Molly','OH 385',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (106,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Smith, Mrs. LePoint','OH 384',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (107,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Steen, Mrs. Ann N.','OH 378',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (108,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Varner, Lynn and Barbara','OH 383',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);
$query = "INSERT INTO theW(ID,Institution,CollectionTitle,InstCollNum,InclusiveDates,Extent,SubjectHeadings,Descriptions,Link,Notes) VALUES (109,'Delta State University - Charles W. Capps, Jr. Archives and Museum','Wheeler, Cherry and Nott','OH 375',NULL,NULL,'Historic Neighborhoods Oral Histories',NULL,NULL,NULL);";
$conn->query($query);

?>