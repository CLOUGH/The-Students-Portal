/*
A COURSE Object consists of the following fields :
-----------

subject             : first part of the course code. e.g. COMP, MGMT, CHEM
coursenum           : numeric part of course code. e.g. 2270 from COMP2270
title               : course title e.g. "Object Technology"
required_sections   : a list of sections required to register for this course
pre_req             : list of [subj, coursenum] for pre-requisites or empty
anti_req            : list of [subj, coursenum] for anti-requisites or empty
co_req              : list of [subj, coursenum] for co-requisites or empty
instr_method        : face-to-face, lab, etc.
description         :
credits             : number of credits for the course
level               : u, g, (undergrad, graduate)
sections            : a list of section offering objects or non-existent

Section Offering Objects:
-----------
semester            : semester id . e.g. 201220 (for 2012/13-spring)
instructor          : internal ID of instructor
enrolled            : a tuple of (capacity, enrolled)
section             : type of activity, lecture, lab, tutorial etc.
campus              : M for mona. W for western campus etc.
location            : where the meetings happen
start_date,
end_date            : start and end times for the course offering
meeting_times       : a list of triples with (day, time, duration_in_min)
crn                 : SAS internal reference number for this offering

Example : 
*/

// COURSE : 
var k = {   title: 'Introduction to Computing I', 
    subject:'COMP', 
    coursenum:'1126',
    required_sections:['lab','tutorial','lecture'],
    description:'',
    credits:3,
    level:'u', // undergraduate
    pre_req:[['COMP','0112'],['COMP','0113']],
    anti_req:[],
    co_req:[],
    instr_method:'f2f', // face to face
    sections:[ // SECTION OFFERINGS : 
            {   semester: '201210',
                campus: 'M',
                crn:'13658',
                section: 'lab',
                instructor: '47960', // 'Gunjan Mansingh',
                location:'ST_CS LAB1',
                start_date:'2012-09-03',
                end_date:'2012-10-12',
                meeting_times: [['M','17:00',120]],
                enrolled: [25,16]
            },
            {   semester: '201210',
                campus: 'M',
                crn:'14899',
                section: 'lecture',
                instructor: '47960', // 'Gunjan Mansingh',
                location:'BasicMed',
                start_date:'2012-09-03',
                end_date:'2012-10-12',
                meeting_times: [['M','13:00',60], ['W','12:00',120]],
                enrolled: [250,86]
                
            },
            {   semester: '201210',
                campus: 'M',
                crn:'13662',
                section: 'tutorial',
                instructor: '95315', // 'Carl C. Beckford',
                location:'CS_TUT RM1',
                start_date:'2012-09-03',
                end_date:'2012-10-12',
                meeting_times: [['F','19:00',60]],
                enrolled: [25,19]
            },
            {   semester: '201210',
                campus: 'M',
                crn:'13671',
                section: 'tutorial',
                instructor: '104710', // 'C. C. Busby-Earle',
                location:'CS_TUT RM1',
                start_date:'2012-09-03',
                end_date:'2012-10-12',
                meeting_times: [['R','18:00',60]],
                enrolled: [25,18]
            },             

    ]
}

/*

URLs and Searching : 

* I'll setup the server to return search results based on any field listed here.
* Any field not listed in the query will be treated as "ALL".
* search page will be at the server with url /search

e.g. http://server.name/search?semester=201210&section=tutorial&subject=MGMT&coursenum=2021

The server doesn't exist yet, but that's pretty much how it'll work. 


*/


