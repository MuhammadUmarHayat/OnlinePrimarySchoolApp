

--
-- Table structure for table `admission_notifications`
--

CREATE TABLE `admission_notifications` (
  `id` int(12) NOT NULL,
  `school_id` int(12) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `opeining_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `date_of_notification` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `admission_requests`
--

CREATE TABLE `admission_requests` (
  `id` int(12) NOT NULL,
  `school_id` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `gaurdianid` varchar(250) NOT NULL,
  `level` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `addmission_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `child_documents`
--

CREATE TABLE `child_documents` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `document` longblob NOT NULL,
  `status` varchar(255) NOT NULL,
  `submitted_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `level` varchar(255) NOT NULL,
  `principal` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(250) NOT NULL,
  `status` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

--
-- Table structure for table `school_cources`
--

CREATE TABLE `school_cources` (
  `id` int(12) NOT NULL,
  `school_id` int(12) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `medium` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `publisher` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `revision_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_cources`
--

-- Table structure for table `school_fees`
--

CREATE TABLE `school_fees` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `level` varchar(150) NOT NULL,
  `fee` int(12) NOT NULL,
  `revision_date` varchar(100) NOT NULL,
  `school_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_fees`
--

--
-- Table structure for table `school_teachers`
--

CREATE TABLE `school_teachers` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `school_id` int(12) NOT NULL,
  `course_id` int(12) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `doe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_teachers`
--

--
-- Table structure for table `school_uniforms`
--

CREATE TABLE `school_uniforms` (
  `id` int(12) NOT NULL,
  `school_id` int(12) NOT NULL,
  `winter_uniform_boys` varchar(250) NOT NULL,
  `winter_uniform_girls` varchar(250) NOT NULL,
  `summer_uniform_boys` varchar(250) NOT NULL,
  `summr_uniform_girls` varchar(250) NOT NULL,
  `revision_date` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_uniforms`
--

-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `school_id` int(12) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `amount` int(12) NOT NULL,
  `submit_date` date NOT NULL,
  `voucher` longblob NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fees`
--

-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(250) NOT NULL,
  `fathername` varchar(250) NOT NULL,
  `cnic` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

--
-- Table structure for table `users_childern`
--

CREATE TABLE `users_childern` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `photo` longblob NOT NULL,
  `remakrs` varchar(255) NOT NULL,
  `id` int(10) NOT NULL,
  `father_cnic` longblob NOT NULL,
  `mother_cnic` longblob NOT NULL,
  `Bform` longblob NOT NULL,
  `domicile` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_childern`
--

--
-- Indexes for table `admission_notifications`
--
ALTER TABLE `admission_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_requests`
--
ALTER TABLE `admission_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_documents`
--
ALTER TABLE `child_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_cources`
--
ALTER TABLE `school_cources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_fees`
--
ALTER TABLE `school_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_teachers`
--
ALTER TABLE `school_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_uniforms`
--
ALTER TABLE `school_uniforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users_childern`
--
ALTER TABLE `users_childern`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_notifications`
--
ALTER TABLE `admission_notifications`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admission_requests`
--
ALTER TABLE `admission_requests`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_documents`
--
ALTER TABLE `child_documents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_cources`
--
ALTER TABLE `school_cources`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_fees`
--
ALTER TABLE `school_fees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_teachers`
--
ALTER TABLE `school_teachers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_uniforms`
--
ALTER TABLE `school_uniforms`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_childern`
--
ALTER TABLE `users_childern`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
