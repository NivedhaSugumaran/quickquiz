-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 08:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-kuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `gcpquestions`
--

CREATE TABLE `gcpquestions` (
  `qno` int(11) NOT NULL,
  `qtype` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `ans1` varchar(2000) NOT NULL,
  `ans2` varchar(2000) NOT NULL,
  `ans3` varchar(2000) NOT NULL,
  `ans4` varchar(2000) NOT NULL,
  `correct_answer` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gcpquestions`
--

INSERT INTO `gcpquestions` (`qno`, `qtype`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(1, 0, 'The Sales department in your company wants to deploy an application that require GPU access and autoscaling support. A good option for them is? ', 'Kubernetes Engine', 'App Engine Flexible\nenvironment', 'Cloud Functions', 'App Engine Standard\nenvironment', 'Kubernetes Engine'),
(2, 0, 'In order to deploy a containerized application your manager wants you to create a GKE regional cluster and a node pool in us-east1 region. But after few weeks your colleague deleted the node pool by mistake. what happens to application? will it be accessible?', 'when you create a regional cluster, all of the node pools are replicated to those zones in us-east1 region automatically. So the application will be accessible from the zones in which the node pools were replicated.', 'Even though all of the node pools are replicated to those zones in us-east1 region automatically, the application will be not be accessible because any deletions delete those node pools from the those zones as well.', 'None of the above', '', 'Even though all of the node pools are replicated to those zones in us-east1 region automatically, the application will be not be accessible because any deletions delete those node pools from the those zones as well.'),
(3, 0, 'The marketing team in your company wants to deploy a web application and also need to attach persistent disks to keep data persistent. A good option for them is? ', 'App Engine Flexible\nenvironment', 'Cloud Functions', 'App Engine Standard\nenvironment', 'Kubernetes Engine', 'Kubernetes Engine'),
(4, 0, 'Your team is planning to develop a chat application using websockets.You suggest they should use a GCP service that supports websockets. The service they would use is ?', 'App Engine Standard\nenvironment', 'Cloud Run', 'Kubernetes Engine', 'Cloud Functions', 'Kubernetes Engine'),
(5, 0, 'The Finance department wants you to leverage GKE to deploy a containerized application that require two different machine types( n1-standard-8  and n2-highmem-4 ). A good option for this is?', 'Create a cluster with 2 node pools. One node pool with n1-standard-8 machine type and another node pool with n2-highmem-4 machine type', 'Use NodeSelector ', 'Create 2 cluster. One cluster with n1-standard-8 machine type and another cluster with n2-highmem-4 machine type', 'Use Node taint', 'Create a cluster with 2 node pools. One node pool with n1-standard-8 machine type and another node pool with n2-highmem-4 machine type'),
(6, 0, 'Which command would you use to have 5 replicas of a deployment named gcp-ace-exam?', 'kubectl scale deployment gcp-ace-exam --pods=5', 'gcloud containers deployment gcp-ace-exam --replicas=5', 'gcloud containers deployment gcp-ace-exam --pods=5', 'kubectl scale deployment gcp-ace-exam --replicas=5', 'kubectl scale deployment gcp-ace-exam --replicas=5'),
(7, 0, 'You have been hired as a consultant to a Food Delivery startup. The startup is planning to deploy a containerized application in GKE and thus wants to store and manage Docker containers in GCP. The service they would use is:', 'Cloud Build ', 'Container Registry', 'Docker Repository', 'Cloud Source Repository', 'Container Registry'),
(8, 0, 'Your colleague has just created a GKE cluster using cloud shell (gcloud container clusters create sample-cluster). But while creating, your colleague forgot to specify the machine type for the nodes. What will be machine type of the nodes that’s been created as a part of cluster?', 'e2-micro', 'e2-small', 'e2-medium', 'n1-standard', 'e2-medium'),
(9, 1, 'In GKE, the deployments can be in three states during its lifecycle. The three states are:', 'progressing', 'stalled', 'completed', 'failed', 'progressing,\ncompleted,\nfailed'),
(10, 0, 'From the machine types listed below, select the machine type that is not supported by GKE.', 'f1-micro', 'e2-micro', 'e2-medium', 'g1-small', 'f1-micro');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qno` int(11) NOT NULL,
  `qtype` int(5) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qno`, `qtype`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(1, 0, 'AWS Elastic Beanstalk will change the health status of a web server environment tier to grey color when:', 'AWS Elastic Beanstalk detects other problems with the environment that are known to make the application unavailable', 'Your application hasn\'t responded to the application health check URL within the last one hour.', 'Your application hasn\'t responded to the application health check URL within the last five minutes.', 'Your application\'s health status is unknown because status is reported when the application is not in the ready state.', 'Your application\'s health status is unknown because status is reported when the application is not in the ready state.'),
(2, 1, 'What AWS products and features can be deployed by Elastic Beanstalk? Choose 3 answers', 'Auto scaling groups', 'Route 53 hosted zones', 'Elastic Load Balancers', 'RDS Instances', 'Auto scaling groups,Elastic Load Balancers,RDS Instances'),
(3, 0, 'AWS Elastic Beanstalk stores your application files and optionally server log files in .', 'Amazon Storage Gateway', ' Amazon Glacier', 'Amazon EC2', ' Amazon S3', ' Amazon S3'),
(4, 0, 'In AWS Elastic Beanstalk, if the application returns any response other than 200 ,OK or there is no response within the configured InactivityTimeout period, .', 'SQS once again makes the message visible in the queue and available for another attempt at processing', 'SQS waits for another timeout', 'SQS run DeleteMessagecall and deletes the message from the queue', 'SQS sends a message to the application with the MessageID and pending status', 'SQS once again makes the message visible in the queue and available for another attempt at processing'),
(5, 0, 'Which Amazon service is not used by Elastic Beanstalk?', ' Amazon S3', 'Amazon ELB', ' Auto scaling', 'Amazon EMR', 'Amazon EMR'),
(6, 0, 'In AWS Elastic Beanstalk, applications can have _________ and each application version _________.\n\n', 'unique versions-can refer to few applications', 'unique versions-can have the same name of before', '\nmany versions- can refer to many applications', 'many versions-is unique', 'many versions- is unique'),
(7, 0, 'A customer needs to perform deployment with minimal outage and should only use existing instances to retain application access log in the Elastic beanstalk environment.What deployment policy would satisfy these requirements?', 'Rolling', ' All at once', ' Rolling with an additional batch', 'Immutable', 'Rolling'),
(8, 0, 'A Developer has developed a web application and wants to deploy it quickly on a Tomcat server on AWS. The Developer wants to avoid having to manage the underlying infrastructure.What is the easiest way to deploy the application, based on these requirements?', 'AWS CloudFormation', ' AWS Elastic Beanstalk', 'AWS CodePipeline', ' Amazon S3', ' AWS Elastic Beanstalk'),
(9, 0, 'A company has a website that is developed in PHP and WordPress and is launched using AWS Elastic Beanstalk. There is a new version of the website that needs to be deployed in the Elastic Beanstalk environment. The company cannot tolerate having the website offline if an update fails. Deployments must have minimal impact and rollback as soon as possible.What deployment method should be used?', 'All at once', 'Rolling', 'Snapshots', 'Immutable', 'Immutable'),
(10, 0, 'A Developer created configuration specifications for an AWS Elastic Beanstalk application in a file named healthcheckurl.yaml in the .ebextensions/  directory of their application source bundle. The file contains the following:   option_settings: namespace:aws:elasticbeanstalk:application\noption_name:Application Healthcheck URL\n value: /health_check                       After the application launches, the health check is not being run on the correct path, event though it is valid.\nWhat can be done to correct this configuration file?\n\n', 'Convert the file to JSON format.', 'Rename the file to a .config extension.', 'Change the configuration section from options_settings to resources.', 'Change the namespace of the option settings to a custom namespace. ', 'Rename the file to a .config extension.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `score1` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `played_on`, `score`, `score1`) VALUES
(1, 'swathyrenganathan@gmail.com', '2021-03-01 16:08:50', 0, 0),
(92, 'sakthiveshali21@gmail.com', '2021-03-05 19:24:19', 0, 0),
(2, 'indhu16cs026@rmkcet.ac.in', '2021-03-02 20:40:09', 0, 0),
(3, 'indhuja2105@gmail.com', '2021-03-05 10:35:32', 2, 3),
(91, 'nivedha98s@gmail.com', '2021-03-05 19:47:46', 0, 11),
(4, 'indhujaanu2025@gmail.com', '2021-03-02 05:52:26', 2, 0),
(5, 'nivedhas@virtusa.com', '2021-03-05 18:53:33', 1, 2),
(6, 'rswathy@virtusa.com', '2021-03-05 10:22:54', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gcpquestions`
--
ALTER TABLE `gcpquestions`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gcpquestions`
--
ALTER TABLE `gcpquestions`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
