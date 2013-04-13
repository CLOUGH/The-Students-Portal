<?php

class Add_Computer_Science_Courses {    

	public function up()
    {
		DB::table('courses')->insert(array(
			'title'=>'Intro. to Computing I',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP1126',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'1',
			'credit'=>'3',
			'description'=>	'This course is intended to lay the foundations for developing good problem solving
							 skills within students of Computing. It is not aimed at teaching any particular 
							 programming language or paradigm per se. The ideas covered in this course will be 
							 revisited in more detail in a variety of courses in the subsequent part of the 
							 Information Technology/Computer Science major. As a consequence, no knowledge of 
							 programming is assumed as a prerequisite to this course, yet at the end of the course 
							 students would have been exposed in a concrete way to computation, and the tools that 
							 have been developed to control its complexity as well as implement its processes in 
							 physical devices. This course therefore serves as one of the cornerstone courses of 
							 the entire curriculum for the Information Technology programme and the Computer Science 
							 major, and requires only that students come to it prepared to think in ways unfamiliar 
							 to them.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Intro. to Computing II',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP1127',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'The primary goal of the course is to introduce students to the big ideas in Computer Science, and
							how they are used to control the complexity of developing large computational systems. In this
							course, recognising patterns of problem solving is more important than the efficiency of the
							solutions themselves. An interpreted language is used to facilitate rapid feedback to the student
							as she experiments with proposed solutions to a problem. We hope that this mode of interaction
							will build confidence in students as they learn the joys and challenges of programming. This
							course continues the entry level course COMP1126. It covers concepts and tools that are
							essential in strengthening the learning of programming. These include data structures and higher
							order functions.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Object-oriented Programming',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP1161',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'This course covers the methodology of programming from an object-oriented perspective, and
							introduces OOP principles using a language that supports the OOP paradigm. It also introduces
							object-oriented testing and debugging techniques, as well as the basics of graphical user interface
							programming and event-driven programming. The course continues the introduction to
							programming started in COMP1126 and continued in COMP1127.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Math for Computing',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP1210',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'Discrete structures include important material from such areas as set theory, logic, graph theory,
							 and combinatorics. This material is foundational for computing. This course includes a body of 
							 material of a mathematical nature that computer science and information technology education must 
							 include. The course material forms the basis of knowledge necessary for specialization in computing.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Computing and Society',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP1220',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'1',
			'credit'=>'3',
			'description'=>'This course aims to engender an understanding of the basic cultural, social, legal, and ethical issues 
							inherent in the discipline of computing. It describes where the discipline has been, where it is, and 
							where it is heading, in the global as well as the regional context. It also aims to create an awareness 
							of the role of the individual in this process, as well as an appreciation of the philosophical questions, 
							technical problems, and aesthetic values that play an important part in the development of the discipline. 
							This course on Computing and society examines the relatively short history of computing and establishes 
							context and trends. It looks at the emergence of different programming languages and paradigms and the 
							significant impact they have had. Computing has a social context that the course examines. Issues of 
							professional ethics and risks of computing products are also examined.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));

		DB::table('courses')->insert(array(
			'title'=>'Software Engineering',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2140',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'The primary goal of the course will be to introduce students to the intricacies in planning
							and developing large information systems and emphasizing the need for different
							methods. The students will be introduced to certain techniques and tools to facilitate large
							information systems development.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Web Design & Programming I',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2180',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'This course covers the foundations of the technologies that enable the creation of interactive
							websites that process and modify server-based data. This includes fundamental networking
							technologies, data representation for the web, web UI design and site design, client-server
							architecture and client-side and server-side programming. It covers the fundamentals of e-
							commerce, web security, ethical and social issues, and relevant software engineering concepts
							such as the three-tier architecture and frameworks for the web. It also provides an introduction to
							mobile web issues and web multimedia.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Operating Systems',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP3100',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'3',
			'credit'=>'3',
			'description'=>'This course introduces the fundamentals of operating systems design and
							implementation, a central topic in computer systems. An operating system defines an
							abstraction of hardware behavior with which programmers can control the hardware. It
							also manages resource sharing among the computers users. The topics in this area
							explain the issues that influence the design of contemporary operating systems.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Information Systems in Organisations',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP3110',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'3',
			'credit'=>'3',
			'description'=>'This course introduces student to the challenges that are faced by organizations as they
							attempt to use information technology to create competitive businesses that provide
							useful goods and services to their customers.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Introduction to Artificial Intelligence',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP3120',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'3',
			'credit'=>'3',
			'description'=>'The primary goal of Artificial Intelligence (AI) is to build computer systems to solve
							problems that are difficult or impractical to solve by traditional computing methods, but
							easy for people. The emphasis of this course is on the computational techniques for
							simulating human intelligence. Most of the time is devoted to general AI problem solving
							techniques, the remainder, to specific sub-areas of the discipline.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));

		DB::table('courses')->insert(array(
			'title'=>'Database Management Systems',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP3160',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'3',
			'credit'=>'3',
			'description'=>'This course aims to introduce students to the principles behind Database Management Systems. 
							Students will gain practical experience in designing a database driven application using current 
							Database design techniques, as well as implementing, manipulating and maintaining, this application 
							using current Database Management System Technology. In addition to this practical exposure, students 
							should be able to discuss current trends in Database technology..',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Group Project',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP3900',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'3',
			'credit'=>'3',
			'description'=>'COMP3900 is the group project course in the Computer Science curriculum. It is a required course for
							all students majoring in Computer Science. It is intended to be a capstone course that will bring
							together many of the topics that were covered in the rest of the curriculum. For this reason, we
							expect that students take this course in their final year, or at least after they have completed all
							of the core courses of the curriculum.

							In this course, students will identify a project they would like to work on, and be assigned to
							a supervisor who is able to provide guidance on the specific topic they have chosen. The scope of
							acceptable projects is wide open. Students are encouraged to approach this course with an open
							mind, and to be creative in coming up with their projects. In coming up with a project idea, you are
							encouraged to think about problems that need solving, rather than technologies that you know how
							to apply. Your supervisor will help you to scope your project appropriately, and to provide technical
							assistance with some aspects of your design and implementation. However, do not expect that your
							supervisor will know all of the answers to all of your questions. Learning specific details that are
							rarely known to other persons in the computing field is something you should learn to expect when
							you become fully immersed in a project; and you will find that it can be a tremendously satisfying
							experience. One way to view COMP3900 is as an opportunity to learn about a computing topic that
							was not covered to your satisfaction within the rest of the curriculum; you are encouraged to make
							the most of that opportunity.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Discrete Mathematics for Computer Science',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2101',
			'faculty_id'=>'1',
			'semester'=>'1',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'The role of Mathematics in Computer Science has at least two facets:

							it provides a basis for the theoretical aspects of computing
							(especially analysis of algorithms and the theory of computation), and
							it supports the application of computation to problems in
							science and engineering.
							This course aims to introduce students to a selection of topics that
							addresses both facets. First, it introduces them to fundamental
							concepts in theoretical computer science, such as proof by induction
							and the use of graphs as a general abstraction mechanism. Second, it
							exposes students to specific topics that are likely to be relevant to
							many of the areas of application of computing, particularly in the
							science and engineering disciplines.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('courses')->insert(array(
			'title'=>'Computer Organisation',
			'subject'=>'Computer Science',
			'type'=>'theory',
			'code'=>'COMP2240',
			'faculty_id'=>'1',
			'semester'=>'2',
			'level'=>'2',
			'credit'=>'3',
			'description'=>'This course aims to introduce students to the principles behind the
							organization of a computing system.

							It identifies the primitive building blocks from which computers
							are built, and describes how information is represented physically.
							It describes the techniques used to control the complexity of
							building increasingly sophisticated components from simpler ones.
							item It makes explicit the relationship between instruction execution
							and changes in hardware state.
							In addition to these architectural concerns, the course discusses some
							of the techniques used by the operating system to manage the hardware
							for use by applications. It also discusses the interfaces to some
							common peripheral devices, such as video displays, network controller
							cards, keyboards and mice.',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));

    }    

	public function down()
    {
		DB::table('courses')->where('code', '=', 'COMP3900')->delete();
		DB::table('courses')->where('code', '=', 'COMP3160')->delete();
		DB::table('courses')->where('code', '=', 'COMP3120')->delete();
		DB::table('courses')->where('code', '=', 'COMP3110')->delete();
		DB::table('courses')->where('code', '=', 'COMP2180')->delete();
		DB::table('courses')->where('code', '=', 'COMP2140')->delete();
		DB::table('courses')->where('code', '=', 'COMP1220')->delete();
		DB::table('courses')->where('code', '=', 'COMP1210')->delete();
		DB::table('courses')->where('code', '=', 'COMP1127')->delete();
		DB::table('courses')->where('code', '=', 'COMP1126')->delete();
		DB::table('courses')->where('code', '=', 'COMP2101')->delete();
		DB::table('courses')->where('code', '=', 'COMP2240')->delete();


    }

}