-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 11:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_study_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `answer`, `created_at`) VALUES
(1, 2, 1, 'dnjsdnjksdjkds', '2025-05-23 12:13:38'),
(2, 3, 1, 'erjfdn', '2025-05-23 12:19:04'),
(3, 4, 4, 'cse means computer science and engineering!', '2025-05-24 12:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `career_roadmap`
--

CREATE TABLE `career_roadmap` (
  `id` int(11) NOT NULL,
  `career_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `steps` text NOT NULL,
  `resources` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_roadmap`
--

INSERT INTO `career_roadmap` (`id`, `career_name`, `description`, `steps`, `resources`) VALUES
(1, 'Software Developer', 'Design and develop software applications across various industries.', '1. Learn programming fundamentals (Python, Java) ; 2. Study data structures & algorithms ; 3. Understand software design patterns & architecture ; 4. Build real-world projects & contribute to open source ; 5. Master version control with Git ; 6. Prepare for technical interviews', 'CS50 Introduction to Computer Science: https://cs50.harvard.edu/ ; Coursera Software Development Specialization: https://www.coursera.org/specializations/software-development'),
(2, 'Web Developer', 'Create responsive, dynamic websites and web applications.', '1. Master HTML5, CSS3, JavaScript ; 2. Learn front-end frameworks (React, Vue) ; 3. Build RESTful APIs with Node.js/Express or Django ; 4. Work with databases (MySQL, MongoDB) ; 5. Deploy with Docker and CI/CD ; 6. Develop a full-stack portfolio', 'The Odin Project: https://www.theodinproject.com ; freeCodeCamp Responsive Web Design: https://www.freecodecamp.org'),
(3, 'Mobile App Developer', 'Develop native and cross-platform mobile applications.', '1. Choose a platform (Android or iOS) ; 2. Learn platform SDK (Kotlin/Java for Android, Swift for iOS) ; 3. Explore cross-platform tools (Flutter, React Native) ; 4. Build and publish apps to Play Store/App Store ; 5. Integrate APIs and push notifications ; 6. Optimize performance and UI/UX', 'Udacity Android Basics by Google: https://www.udacity.com/course/android-basics-nanodegree-by-google--nd803 ; Coursera iOS App Development: https://www.coursera.org/specializations/app-development'),
(4, 'Data Scientist', 'Extract insights and build predictive models from data.', '1. Learn Python or R ; 2. Master statistics & probability ; 3. Study data wrangling with pandas or dplyr ; 4. Visualize data (Matplotlib, ggplot2) ; 5. Build machine learning models (scikit-learn) ; 6. Deploy models and communicate results', 'IBM Data Science Professional Certificate: https://www.coursera.org/professional-certificates/ibm-data-science ; DataCamp Data Scientist with Python: https://www.datacamp.com'),
(5, 'Machine Learning Engineer', 'Design, train, and deploy scalable ML systems.', '1. Strong foundation in calculus & linear algebra ; 2. Master core ML algorithms ; 3. Learn deep learning frameworks (TensorFlow, PyTorch) ; 4. Work on model evaluation & tuning ; 5. Deploy models with Docker/Flask ; 6. Monitor and maintain in production', 'Stanford Machine Learning (Andrew Ng): https://www.coursera.org/learn/machine-learning ; DeepLearning.AI TensorFlow Developer: https://www.coursera.org/specializations/tensorflow-in-practice'),
(6, 'DevOps Engineer', 'Streamline development and operations workflows.', '1. Learn Linux fundamentals ; 2. Master scripting (Bash, Python) ; 3. Understand CI/CD tools (Jenkins, GitHub Actions) ; 4. Containerize with Docker & Kubernetes ; 5. Configure infrastructure as code (Terraform) ; 6. Monitor systems (Prometheus, Grafana)', 'Coursera DevOps Specialization: https://www.coursera.org/specializations/devops ; AWS Certified DevOps Engineer Prep: https://aws.amazon.com/training'),
(7, 'Cybersecurity Analyst', 'Protect systems and networks from cyber threats.', '1. Learn networking basics ; 2. Study operating system security ; 3. Master threat detection and incident response ; 4. Practice penetration testing ; 5. Implement security tools (SIEM, IDS/IPS) ; 6. Maintain compliance standards', 'IBM Cybersecurity Analyst Certificate: https://www.coursera.org/professional-certificates/ibm-cybersecurity-analyst ; Cybrary Introduction to IT & Cybersecurity: https://www.cybrary.it'),
(8, 'Cloud Engineer', 'Design and manage cloud infrastructure and services.', '1. Master one cloud provider (AWS, GCP, Azure) ; 2. Learn virtualization & networking in cloud ; 3. Deploy applications with containers & serverless ; 4. Implement security best practices ; 5. Automate with Terraform & CloudFormation ; 6. Optimize cost and performance', 'Google Cloud Professional Cloud Architect: https://www.coursera.org/professional-certificates/gcp-architecture ; AWS Solutions Architect – Associate: https://aws.amazon.com/training'),
(9, 'Database Administrator', 'Design, implement, and maintain database systems.', '1. Learn SQL and relational theory ; 2. Study a major RDBMS (MySQL, PostgreSQL, Oracle) ; 3. Understand backup, recovery, and replication ; 4. Optimize performance with indexing & tuning ; 5. Implement security and encryption ; 6. Automate maintenance tasks', 'Udemy The Complete SQL Bootcamp: https://www.udemy.com/course/the-complete-sql-bootcamp/ ; Oracle Database 12c Administration: https://education.oracle.com'),
(10, 'Network Engineer', 'Plan, implement, and troubleshoot network infrastructures.', '1. Master TCP/IP and OSI model ; 2. Learn routing & switching fundamentals ; 3. Configure firewalls and VPNs ; 4. Implement VLANs and network security ; 5. Monitor with SNMP & NetFlow ; 6. Prepare for certification exams', 'Cisco CCNA via NetAcad: https://www.netacad.com/courses/networking/ccna ; Coursera Networking Fundamentals: https://www.coursera.org/learn/networking-basics');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `content_type` varchar(50) DEFAULT NULL,
  `content_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `provider`, `description`, `link`, `created_at`, `content_type`, `content_path`) VALUES
(1, 'Intro to Computer Science', 'Harvard (CS50)', 'Learn the basics of computer science, algorithms, and programming.', 'https://cs50.harvard.edu/x/', '2025-05-18 08:32:49', NULL, NULL),
(2, 'Responsive Web Design', 'freeCodeCamp', 'Master HTML, CSS, Flexbox, and more with hands-on projects.', 'https://www.freecodecamp.org/learn', '2025-05-18 08:32:49', NULL, NULL),
(3, 'Web Development Bootcamp', 'freeCodeCamp', 'A full curriculum covering HTML, CSS, JavaScript, front-end libraries, APIs, back-end development, and more.', 'https://www.freecodecamp.org/learn', '2025-05-19 05:50:34', NULL, NULL),
(4, 'Python for Everybody', 'Coursera / University of Michigan', 'Learn Python programming from scratch and how to use it for data access, web APIs, and databases.', 'https://www.coursera.org/specializations/python', '2025-05-19 05:50:34', NULL, NULL),
(5, 'Machine Learning', 'Coursera / Stanford (Andrew Ng)', 'The famous machine learning course by Andrew Ng covering supervised learning, unsupervised learning, and best practices.', 'https://www.coursera.org/learn/machine-learning', '2025-05-19 05:50:34', NULL, NULL),
(6, 'Full Stack Open', 'University of Helsinki', 'Hands-on full stack development course covering React, Node.js, MongoDB, GraphQL, TypeScript, and more.', 'https://fullstackopen.com/en/', '2025-05-19 05:50:34', NULL, NULL),
(7, 'The Complete SQL Bootcamp', 'Udemy', 'A practical SQL course covering querying, joins, aggregations, and databases with PostgreSQL.', 'https://www.udemy.com/course/the-complete-sql-bootcamp/', '2025-05-19 05:50:34', NULL, NULL),
(8, 'Introduction to Cybersecurity', 'Cisco Networking Academy', 'Learn the basics of cybersecurity, how threats work, and how to defend networks and data.', 'https://www.netacad.com/courses/cybersecurity/introduction-cybersecurity', '2025-05-19 05:50:34', NULL, NULL),
(9, 'DevOps on AWS Specialization', 'Coursera / AWS', 'Build, test, and deploy applications using AWS and DevOps practices like CI/CD, monitoring, and automation.', 'https://www.coursera.org/specializations/aws-devops', '2025-05-19 05:50:34', NULL, NULL),
(10, 'MIT OpenCourseWare: Introduction to Algorithms', 'MIT OCW', 'Advanced course on algorithms and data structures used in computer science, from MIT.', 'https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/6-006-introduction-to-algorithms-fall-2011/', '2025-05-19 05:50:34', NULL, NULL),
(11, 'CS50: Introduction to Computer Science', 'Harvard / edX', 'A comprehensive introduction to computer science for beginners, covering algorithms, data structures, web development, and more.', 'https://cs50.harvard.edu/x/', '2025-05-19 05:51:31', NULL, NULL),
(12, 'Google IT Support Professional Certificate', 'Coursera / Google', 'Learn the fundamentals of IT support including troubleshooting, networking, system administration, and security.', 'https://www.coursera.org/professional-certificates/google-it-support', '2025-05-19 05:51:31', NULL, NULL),
(13, 'Introduction to Data Structures', '', 'A beginner-friendly overview of fundamental data structures used in programming.', '', '2025-05-27 22:03:55', 'html', '<h3>What You’ll Learn:</h3><ul><li>Arrays and Linked Lists</li><li>Stacks and Queues</li><li>Trees and Graphs</li></ul><p>This course includes examples in C/C++ and Python with visual explanations.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_definitions`
--

CREATE TABLE `group_definitions` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_definitions`
--

INSERT INTO `group_definitions` (`id`, `group_name`, `description`, `created_at`) VALUES
(1, 'Intro to Machine Learning Cohort', 'A study circle for Dr. Alice Johnson’s “Intro to Machine Learning” course. Weekly live problem-solving sessions and project check-ins.', '2025-05-23 10:55:05'),
(2, 'Full Stack Web Dev Guild', 'Hands-on workshop group for Bob Smith’s “Full Stack Web Dev” course: group code reviews, pair-programming, and deployment sprints.', '2025-05-23 10:55:05'),
(3, 'AWS Cloud Architects', 'Peer group for Carol Yang’s “AWS Cloud Architect” course. Bi-weekly deep-dives on VPC, Lambda, and Terraform labs.', '2025-05-23 10:55:05'),
(4, 'DevOps Foundations Crew', 'Discussion forum & lab partners for David Lee’s “DevOps Foundations.” Focus on CI/CD pipelines, Kubernetes, and monitoring tools.', '2025-05-23 10:55:05'),
(5, 'Ethical Hacking & Security Hub', 'Emma Davis’s “Ethical Hacking & Security” study-group: capture-the-flag challenges, vulnerability walkthroughs, and toolkit sharing.', '2025-05-23 10:55:05'),
(6, 'Data Engineering Lab', 'Frank Miller’s “Data Engineering with Python” group: build and review ETL pipelines together, share best practices.', '2025-05-23 10:55:05'),
(7, 'Mobile App Dev Circle', 'Grace Chen’s “Android & iOS Development” cohort for UI reviews, Flutter widget workshops, and app store publishing tips.', '2025-05-23 10:55:05'),
(8, 'MLOps Practitioners', 'Hiroshi Tanaka’s “MLOps & Model Deployment” group: Docker, FastAPI serving demos, and model-drift monitoring sessions.', '2025-05-23 10:55:05'),
(9, 'UI/UX Design Studio', 'Isabella Rossi’s “Design Thinking & UI/UX” workshop: Figma critiques, accessibility audits, and component library collaboration.', '2025-05-23 10:55:05'),
(10, 'Advanced SQL & DBA Forum', 'Jamal Khan’s “Advanced SQL & DBA” peer group: query optimization labs, backup/recovery drills, and replication case studies.', '2025-05-23 10:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `apply_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position`, `company`, `description`, `location`, `apply_link`, `created_at`) VALUES
(1, 'Frontend Developer Intern', 'TechNova Solutions', 'Assist in building responsive UIs using React and TailwindCSS.', 'Dhaka, Bangladesh', 'https://example.com/apply/frontend-intern', '2025-05-18 08:33:37'),
(2, 'Backend Developer', 'CodeNest Ltd.', 'Work on APIs, databases, and server-side logic using PHP and MySQL.', 'Remote', 'https://example.com/apply/backend-dev', '2025-05-18 08:33:37'),
(3, 'Front-End Engineer', 'Meta (Facebook)', 'Develop and optimize React-based web applications for billions of Facebook users. Collaborate with design and product teams.', 'Menlo Park, CA, USA', 'https://www.linkedin.com/jobs/view/3456789012/', '2025-05-19 06:26:45'),
(4, 'Data Analyst', 'IBM', 'Analyze large datasets to generate insights and build dashboards with Python, SQL, and Tableau.', 'New York, NY, USA', 'https://www.linkedin.com/jobs/view/4567890123/', '2025-05-19 06:26:45'),
(5, 'Machine Learning Engineer', 'NVIDIA', 'Build and deploy deep learning models for real-time image and video processing on GPU platforms.', 'Santa Clara, CA, USA', 'https://www.linkedin.com/jobs/view/5678901234/', '2025-05-19 06:26:45'),
(6, 'DevOps Engineer', 'Spotify', 'Automate CI/CD pipelines, container orchestration (Kubernetes), and monitoring for Spotify’s streaming services.', 'New York, NY, USA', 'https://www.linkedin.com/jobs/view/6789012345/', '2025-05-19 06:26:45'),
(7, 'Cloud Solutions Architect', 'Amazon Web Services', 'Design and implement secure, scalable cloud architectures for enterprise customers on AWS.', 'Seattle, WA, USA', 'https://aws.amazon.com/careers/123456', '2025-05-19 06:26:45'),
(8, 'QA Engineer', 'Microsoft', 'Develop automated test frameworks and perform end-to-end testing for Microsoft 365 applications.', 'Redmond, WA, USA', 'https://careers.microsoft.com/us/en/job/789012345', '2025-05-19 06:26:45'),
(9, 'Full Stack Developer', 'Upwork', 'Work remotely to build web applications using Node.js, React, and MongoDB for Upwork clients.', 'Remote', 'https://www.upwork.com/ab/jobs/890123456/', '2025-05-19 06:26:45'),
(10, 'Junior Web Developer', 'Brain Station 23', 'Create responsive websites and back-end APIs with PHP/Laravel and MySQL for local and international clients.', 'Dhaka, Bangladesh', 'https://brainstation-23.com/careers/', '2025-05-19 06:26:45'),
(11, 'Software Engineer Intern', 'Google', 'Join Google’s Search team as a Software Engineer Intern to build scalable systems and improve search relevance for billions of users.', 'Mountain View, CA, USA', 'https://www.linkedin.com/jobs/view/1234567890/', '2025-05-19 06:26:45'),
(12, 'Backend Developer', 'Amazon', 'Design and implement microservices for Amazon’s global retail platform. Work with Java, Spring Boot, and AWS.', 'Seattle, WA, USA', 'https://www.linkedin.com/jobs/view/2345678901/', '2025-05-19 06:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `profile_link` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `full_name`, `expertise`, `profile_link`, `photo`, `course_name`, `course_description`, `created_at`) VALUES
(1, 'Ayesha Rahman', 'Machine Learning & AI', 'https://linkedin.com/in/ayesha-ml', '', '', '', '2025-05-18 08:34:41'),
(2, 'Tanvir Ahmed', 'Web Development', 'https://github.com/tanvirdev', '', '', '', '2025-05-18 08:34:41'),
(3, 'Carol Yang', 'Cloud Computing', 'https://www.linkedin.com/in/carol-yang', 'carol.jpg', 'AWS Cloud Architect', 'Learn to design, deploy, and manage scalable cloud architectures using core AWS services.', '2025-05-19 16:16:33'),
(4, 'David Lee', 'DevOps & Automation', 'https://www.linkedin.com/in/david-lee', 'david.jpg', 'DevOps Foundations', 'Master CI/CD pipelines, containerization with Docker, orchestration with Kubernetes, and IaC with Terraform.', '2025-05-19 16:16:33'),
(5, 'Emma Davis', 'Cybersecurity & Pentesting', 'https://www.linkedin.com/in/emma-davis', 'emma.jpg', 'Ethical Hacking & Security', 'Covers penetration testing methodologies, network security, and incident response fundamentals.', '2025-05-19 16:16:33'),
(6, 'Bob Smith', 'Web Development', 'https://www.linkedin.com/in/bob-smith', 'bob.jpg', 'Full Stack Web Dev', 'Hands-on course covering HTML, CSS, JavaScript, Node.js, and React to build modern web applications.', '2025-05-19 16:16:33'),
(7, 'Dr. Alice Johnson', 'AI & Machine Learning', 'https://www.linkedin.com/in/alice-johnson', 'alice.jpg', 'Intro to Machine Learning', 'Comprehensive course covering supervised and unsupervised learning techniques using Python and scikit-learn.', '2025-05-19 16:16:33'),
(8, 'Dr. Alice Johnson', 'AI & Machine Learning', 'https://www.linkedin.com/in/alice-johnson', 'alice.jpg', 'Intro to Machine Learning', 'This course begins with supervised learning (linear/logistic regression, decision trees) and moves on to unsupervised methods (K-means, PCA). You’ll build end-to-end ML pipelines in Python’s scikit-learn, then dive into neural networks with TensorFlow/Keras, finishing with a deployed capstone project.', '2025-05-19 16:47:29'),
(9, 'Bob Smith', 'Web Development', 'https://www.linkedin.com/in/bob-smith', 'bob.jpg', 'Full Stack Web Dev', 'A hands-on curriculum covering HTML5, CSS3, ES6+ JavaScript, React & Redux for the front-end, plus Node.js/Express, MongoDB/PostgreSQL on the back-end. Learn to containerize with Docker, set up CI/CD, and deploy to AWS or Heroku.', '2025-05-19 16:47:29'),
(10, 'Carol Yang', 'Cloud Computing', 'https://www.linkedin.com/in/carol-yang', 'carol.jpg', 'AWS Cloud Architect', 'Design, secure, and optimize cloud architectures on AWS. This course covers EC2, S3, RDS, VPC networking, IAM, serverless (Lambda/API Gateway), IaC with CloudFormation & Terraform, and monitoring with CloudWatch & CloudTrail.', '2025-05-19 16:47:29'),
(11, 'David Lee', 'DevOps & Automation', 'https://www.linkedin.com/in/david-lee', 'david.jpg', 'DevOps Foundations', 'Master the DevOps toolchain: build CI/CD pipelines with Jenkins & GitHub Actions; containerization with Docker; orchestration via Kubernetes; IaC with Terraform & Ansible; monitoring with Prometheus & Grafana; plus blue/green and canary deployments.', '2025-05-19 16:47:29'),
(12, 'Emma Davis', 'Cybersecurity & Pentesting', 'https://www.linkedin.com/in/emma-davis', 'emma.jpg', 'Ethical Hacking & Security', 'Learn offensive security: network reconnaissance (Nmap, Wireshark), vulnerability scanning, exploitation (Metasploit), web app security (OWASP Top 10), and post-exploitation. Includes labs simulating real attacks and social engineering exercises.', '2025-05-19 16:47:29'),
(13, 'Frank Miller', 'Data Engineering', 'https://www.linkedin.com/in/frank-miller', 'frank.jpg', 'Data Engineering with Python', 'Build scalable ETL pipelines using Python, Airflow, and AWS Glue. Topics include data modeling, batch vs streaming (Kafka), database warehousing (Redshift), and orchestration best practices.', '2025-05-19 16:47:29'),
(14, 'Grace Chen', 'Mobile App Development', 'https://www.linkedin.com/in/grace-chen', 'grace.jpg', 'Android & iOS Development', 'Develop native Android apps with Kotlin and iOS apps with SwiftUI. Then learn cross-platform with Flutter: UI widgets, state management, RESTful integration, push notifications, and App Store/Play Store deployment.', '2025-05-19 16:47:29'),
(15, 'Hiroshi Tanaka', 'Machine Learning Ops', 'https://www.linkedin.com/in/hiroshi-tanaka', 'hiroshi.jpg', 'MLOps & Model Deployment', 'Operationalize ML: model versioning, Docker packaging, serving with TensorFlow Serving & FastAPI, monitoring drift, A/B tests, and scalable deployment on Kubernetes and AWS SageMaker.', '2025-05-19 16:47:29'),
(16, 'Isabella Rossi', 'UI/UX Design', 'https://www.linkedin.com/in/isabella-rossi', 'isabella.jpg', 'Design Thinking & UI/UX', 'Learn design thinking, wireframing with Figma, prototyping, user research, and accessibility best practices. Translate designs into pixel-perfect React components and maintain design systems.', '2025-05-19 16:47:29'),
(17, 'Jamal Khan', 'Database Administration', 'https://www.linkedin.com/in/jamal-khan', 'jamal.jpg', 'Advanced SQL & DBA', 'Cover relational theory, normalization, indexing strategies, query optimization, backup/restore, clustering, replication, and security hardening on MySQL and PostgreSQL. Includes real-world performance tuning labs.', '2025-05-19 16:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `mentorship_requests`
--

CREATE TABLE `mentorship_requests` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentorship_requests`
--

INSERT INTO `mentorship_requests` (`id`, `mentor_id`, `user_id`, `message`, `status`, `created_at`) VALUES
(1, 2, 1, 'ddnd', 'pending', '2025-05-19 06:42:18'),
(2, 1, 1, 'ghjghj', 'pending', '2025-05-19 12:53:24'),
(3, 9, 1, 'dkndm,sdn,mds', 'approved', '2025-05-21 04:24:16'),
(4, 12, 1, 'fksdsdl', 'pending', '2025-05-23 10:41:06'),
(5, 8, 1, 'djsdlsd', 'approved', '2025-05-23 10:59:05'),
(6, 9, 1, 'md', 'approved', '2025-05-23 11:03:54'),
(7, 9, 1, 'fmfd', 'approved', '2025-05-23 20:05:39'),
(8, 8, 4, 'wdjjksdnkjds', 'approved', '2025-05-24 12:21:04'),
(9, 8, 4, 'dkjnjsdfjnds', 'pending', '2025-05-24 12:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `link`, `created_at`) VALUES
(1, 'New AI Course Launched by MIT', 'MIT has released a new advanced AI course for CSE students. It covers deep learning, transformers, and real-world AI integration...', 'https://mit.edu/ai-course', '2025-05-18 08:35:19'),
(2, 'Google Summer of Code 2025 Applications Open', 'Students can now apply for GSoC 2025. The program provides stipends and mentorship opportunities to contribute to open-source projects.', 'https://summerofcode.withgoogle.com', '2025-05-18 08:35:19'),
(3, 'IEEE Publishes New AI Safety Standards', 'The IEEE Standards Association released P700X, a suite of guidelines for ethically aligned AI design and deployment. These standards aim to ensure transparency, accountability, and bias mitigation across AI systems.', 'https://standards.ieee.org/ai-safety-standards', '2025-05-19 06:41:45'),
(4, 'GitHub Copilot Expands Language Support', 'GitHub Copilot now supports over 15 programming languages, including Rust, Kotlin, and Go. The AI-powered code assistant helps developers write and review code more efficiently by offering context-aware suggestions.', 'https://github.blog/2025-05-01-copilot-new-languages', '2025-05-19 06:41:45'),
(5, 'Government of Bangladesh Launches $50M Tech Startup Fund', 'The Bangladeshi government announced a $50 million fund to support local tech startups. The initiative includes grants, mentorship programs, and tax incentives to accelerate innovation in software and hardware sectors.', 'https://www.ictd.gov.bd/startup-fund', '2025-05-19 06:41:45'),
(6, 'MIT Researchers Achieve Milestone in Quantum Computing', 'A team at MIT demonstrated error correction in a 50-qubit superconducting quantum processor, marking a key step towards fault-tolerant quantum computers capable of solving complex simulations.', 'https://news.mit.edu/2025/quantum-error-correction', '2025-05-19 06:41:45'),
(7, 'Ubuntu 24.04 LTS Released with Enhanced Security', 'Canonical released Ubuntu 24.04 LTS featuring kernel-level security enhancements, improved ZFS support, and livepatch capabilities to apply critical updates without rebooting. This LTS offers 10 years of support.', 'https://ubuntu.com/blog/ubuntu-24-04-lts-release', '2025-05-19 06:41:45'),
(8, 'Google Announces Android 15 Developer Preview', 'Google launched the Android 15 Developer Preview, introducing privacy improvements, custom lockscreen widgets, and AI-based battery optimizations to extend device uptime for end users.', 'https://developer.android.com/preview/15', '2025-05-19 06:41:45'),
(9, 'Microsoft Azure Rolls Out Confidential Computing', 'Microsoft Azure now offers Confidential Computing instances powered by Intel SGX, enabling users to process sensitive data in public clouds without exposing it to the hypervisor or OS.', 'https://azure.microsoft.com/en-us/services/confidential-compute/', '2025-05-19 06:41:45'),
(10, 'EC-Council Releases CEH v12 Certification', 'EC-Council updated its Certified Ethical Hacker (CEH) certification to v12, covering the latest tactics in penetration testing, cloud security, IoT, and AI-driven attack vectors for aspiring cybersecurity professionals.', 'https://www.eccouncil.org/programs/certified-ethical-hacker-ceh-v12/', '2025-05-19 06:41:45'),
(11, 'OpenAI Unveils GPT-4o with Advanced Multimodal Abilities', 'OpenAI announced GPT-4o, the latest iteration of its generative model, supporting text, image, and code understanding simultaneously. This update promises enhanced context comprehension and cross-modal applications for developers.', 'https://openai.com/blog/gpt-4o', '2025-05-19 06:41:45'),
(12, 'NVIDIA Introduces Ada Lovelace GPU Architecture', 'NVIDIA’s new Ada Lovelace GPU architecture promises up to 2× performance improvements for AI workloads. Built on TSMC\'s 4 nm process, it includes specialized cores for AI inference and real-time ray tracing enhancements.', 'https://www.nvidia.com/en-us/geforce/ada-lovelace/', '2025-05-19 06:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `technologies`, `link`, `created_at`) VALUES
(1, 'AI-Powered Chatbot', 'A chatbot that uses natural language processing to simulate human conversations and answer user queries.', 'Python, TensorFlow, Flask', 'https://github.com/yourusername/ai-chatbot', '2025-05-18 08:35:58'),
(2, 'Online Voting System', 'A secure and user-friendly online voting platform for university elections.', 'PHP, MySQL, Bootstrap', 'https://github.com/yourusername/online-voting-system', '2025-05-18 08:35:58'),
(3, 'Personal Portfolio Website', 'A responsive, single-page portfolio showcasing personal projects, blog posts, and contact form. Includes smooth scrolling and dark/light mode toggle.', 'HTML, CSS, JavaScript, Bootstrap', 'https://github.com/yourusername/portfolio', '2025-05-23 06:18:52'),
(4, 'Chat Application', 'Real-time chat app with user authentication, one-to-one and group messaging, online/offline status, and message history.', 'Node.js, Express, Socket.io, MongoDB', 'https://github.com/yourusername/chat-app', '2025-05-23 06:18:52'),
(5, 'E-Commerce Store', 'Full-stack online store with product listings, shopping cart, payment integration (Stripe), and admin panel for managing inventory.', 'React, Redux, Node.js, Express, PostgreSQL, Stripe API', 'https://github.com/yourusername/ecommerce-store', '2025-05-23 06:18:52'),
(6, 'Machine Learning Model Deployment', 'Trained a convolutional neural network for image classification and deployed it as a REST API using Flask and Docker.', 'Python, TensorFlow, Flask, Docker', 'https://github.com/yourusername/ml-deployment', '2025-05-23 06:18:52'),
(7, 'Task Manager API', 'A RESTful API for a to-do app. Supports user registration, JWT authentication, and CRUD operations on tasks with due dates and priority levels.', 'Python, Django REST Framework, SQLite', 'https://github.com/yourusername/task-manager-api', '2025-05-23 06:18:52'),
(8, 'Weather Dashboard', 'Web app that fetches and displays current weather and 5-day forecast for any city using OpenWeatherMap API, with search history.', 'Vue.js, Axios, OpenWeatherMap API', 'https://github.com/yourusername/weather-dashboard', '2025-05-23 06:18:52'),
(9, 'Blog Platform', 'A multi-user blogging platform with rich-text editor, comments, likes, and RSS feed generation.', 'Ruby on Rails, PostgreSQL, ActionText', 'https://github.com/yourusername/blog-platform', '2025-05-23 06:18:52'),
(10, 'Real-Time Collaboration Tool', 'Collaborative text editor with live cursors and chat, using Operational Transforms to merge concurrent edits.', 'TypeScript, React, Node.js, WebSocket, Yjs', 'https://github.com/yourusername/collab-editor', '2025-05-23 06:18:52'),
(11, 'Fitness Tracker Mobile App', 'Cross-platform mobile app to log workouts, set goals, and track progress with charts and reminders.', 'Flutter, Dart, Firebase', 'https://github.com/yourusername/fitness-tracker', '2025-05-23 06:18:52'),
(12, 'Portfolio CMS', 'Headless CMS built with Strapi to manage portfolio content (projects, blog posts, testimonials), with a Next.js frontend for fast static rendering.', 'Node.js, Strapi, Next.js, GraphQL', 'https://github.com/yourusername/portfolio-cms', '2025-05-23 06:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `created_at`) VALUES
(1, 1, 'what is cse?', '2025-05-23 11:21:58'),
(2, 1, 'what is cse?', '2025-05-23 11:27:20'),
(3, 1, 'skfklsd', '2025-05-23 11:34:43'),
(4, 4, 'what is cse???', '2025-05-24 12:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `type`, `description`, `link`, `created_at`) VALUES
(1, 'DSA Cheat Sheet', 'PDF', 'Quick reference guide covering arrays, trees, graphs, and algorithms.', 'https://example.com/dsa-cheatsheet.pdf', '2025-05-18 08:36:33'),
(2, 'Operating Systems Notes', 'Slides', 'Lecture slides covering memory management, scheduling, and processes.', 'https://example.com/os-slides', '2025-05-18 08:36:33'),
(3, 'YouTube Playlist: Web Dev', 'Video', 'Complete front-end development playlist with HTML, CSS, JavaScript.', 'https://youtube.com/playlist?list=webdev101', '2025-05-18 08:36:33'),
(4, 'Stack Overflow', 'Community Forum', 'Q&A site where developers ask questions and share solutions on virtually every programming topic.', 'https://stackoverflow.com', '2025-05-19 15:49:25'),
(5, 'CS50: Introduction to Computer Science', 'MOOC', 'Harvard’s flagship CS course covering algorithms, data structures, and web development.', 'https://cs50.harvard.edu/x/', '2025-05-19 15:49:25'),
(6, 'MIT OpenCourseWare', 'MOOC', 'Free course materials and lecture videos from MIT’s CS and programming courses.', 'https://ocw.mit.edu/courses/electrical-engineering-and-computer-science/', '2025-05-19 15:49:25'),
(7, 'GitHub', 'Version Control Platform', 'Hosting service for Git repositories with collaboration features, issue tracking, and CI/CD integrations.', 'https://github.com', '2025-05-19 15:49:25'),
(8, 'MDN Web Docs', 'Documentation', 'Authoritative reference for HTML, CSS, JavaScript, and modern web APIs maintained by Mozilla.', 'https://developer.mozilla.org', '2025-05-19 15:49:25'),
(9, 'W3Schools', 'Tutorial Website', 'Beginner-friendly tutorials and references for web technologies including SQL, PHP, and Python.', 'https://www.w3schools.com', '2025-05-19 15:49:25'),
(10, 'Kaggle', 'Data Science Platform', 'Platform for data science competitions, notebooks, datasets, and tutorials to build ML skills.', 'https://www.kaggle.com', '2025-05-19 15:49:25'),
(11, 'GeeksforGeeks', 'Tutorial Website', 'Comprehensive portal covering CS fundamentals, algorithms, data structures, interview prep, and coding practice.', 'https://www.geeksforgeeks.org', '2025-05-19 15:49:25'),
(12, 'freeCodeCamp', 'Coding Platform', 'Interactive lessons and hands-on projects in web development, algorithms, data structures, and data visualization.', 'https://www.freecodecamp.org', '2025-05-19 15:49:25'),
(13, 'LeetCode', 'Practice Platform', 'Library of coding problems for algorithm practice and technical interview preparation with mock contests.', 'https://leetcode.com', '2025-05-19 15:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `study_groups`
--

CREATE TABLE `study_groups` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study_groups`
--

INSERT INTO `study_groups` (`id`, `mentor_id`, `user_id`, `created_at`) VALUES
(1, 9, 1, '2025-05-23 11:03:58'),
(2, 9, 1, '2025-05-23 11:04:02'),
(3, 9, 1, '2025-05-23 22:32:35'),
(5, 8, 1, '2025-05-24 12:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `tip_text` text NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `tip_text`, `author`, `created_at`) VALUES
(1, 'Break study sessions into focused 25-minute intervals with 5-minute breaks (Pomodoro technique).', 'Francesco Cirillo', '2025-05-18 08:38:12'),
(2, 'Push through the moments you want to quit — that’s where the growth happens.', 'Unknown', '2025-05-18 08:38:12'),
(3, 'Review your notes the same day you take them to boost retention.', 'Learning Scientist', '2025-05-18 08:38:12'),
(4, 'Use a consistent code style and linting tool (ESLint, Pylint, etc.) to catch errors and enforce best practices automatically.', 'Linus Torvalds', '2025-05-19 06:34:07'),
(5, 'Spend 15–20 minutes each day reading technical blogs or documentation to stay up-to-date with industry trends.', 'Anonymous', '2025-05-19 06:34:07'),
(6, 'When learning a new algorithm, implement it from scratch in at least two different languages to solidify your understanding.', 'Robert Sedgewick', '2025-05-19 06:34:07'),
(7, 'Always write unit tests for new functionality. Tests serve as both documentation and a safety net for refactoring.', 'Kent Beck', '2025-05-19 06:34:07'),
(8, 'Use keyboard shortcuts in your IDE—invest the time to learn them and you’ll save hours over weeks and months.', 'Anonymous', '2025-05-19 06:34:07'),
(9, 'Keep a personal “learning journal” where you jot down one new thing you learned each day; review it weekly to reinforce knowledge.', 'Anonymous', '2025-05-19 06:34:07'),
(10, 'Network with other developers: join a local meetup or online community, and aim to help someone else at least once per week.', 'Anonymous', '2025-05-19 06:34:07'),
(11, 'When debugging, try to isolate the smallest piece of code that reproduces the bug—this makes finding the root cause much easier.', 'Jeff Atwood', '2025-05-19 06:34:07'),
(12, 'Write meaningful commit messages. A good format is: “<type>(<scope>): <short description>” — it helps your future self and collaborators.', 'Chris Beams', '2025-05-19 06:34:07'),
(13, 'Practice “rubber duck debugging”: explain your code line-by-line to an inanimate object to clarify your own understanding.', 'Anonymous', '2025-05-19 06:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'sakibnghs123@gmail.com', 'sakib3139', '$2y$10$8nknVArU5PmVzMrCMCiujOTTUOONdrAZprpJ8baX6tTDSNJONkYSu', '2025-05-18 08:30:07'),
(2, 'naimasultanarimi07@gmail.com', 'sakib3139', '$2y$10$c54YRwZlPpYQRIuwsbiMs.iEMDKBobIWPo4OsoyrhKf2gLkhkIJha', '2025-05-18 08:30:29'),
(3, 'prosenjit1156@gmail.com', 'Prosenjit Mondol', '$2y$10$LkCOQ5OQsaVS9vzOmJmiDegsSXxJOMGroLRe8K7ONydVqpN9RyidC', '2025-05-19 19:30:56'),
(4, 'sadiareshma@12gmail.com', 'sadiareshma', '$2y$10$C2AtP5p3o1X0FZ6o58QAiOSi0nNO4wOmcZegwHANM20vaYnZpoGZS', '2025-05-24 12:19:29'),
(5, 'abc@gmail.com', 'sakibnghs', '$2y$10$cTUTzdX2I4ogog5gJ4zYA.tyNuwQ1eKM7cR6kYXkYsduiGpUG9cLa', '2025-05-26 09:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `career_roadmap`
--
ALTER TABLE `career_roadmap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `group_definitions`
--
ALTER TABLE `group_definitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_groups`
--
ALTER TABLE `study_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_id` (`mentor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_membership` (`user_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `career_roadmap`
--
ALTER TABLE `career_roadmap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_definitions`
--
ALTER TABLE `group_definitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `study_groups`
--
ALTER TABLE `study_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `fk_gm_defs` FOREIGN KEY (`group_id`) REFERENCES `group_definitions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_gm_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentorship_requests`
--
ALTER TABLE `mentorship_requests`
  ADD CONSTRAINT `mentorship_requests_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`),
  ADD CONSTRAINT `mentorship_requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `study_groups`
--
ALTER TABLE `study_groups`
  ADD CONSTRAINT `fk_sg_mentors` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sg_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group_definitions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
