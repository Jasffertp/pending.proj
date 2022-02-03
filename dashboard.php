<head>
<title>Dashboard</title>
</head>
<body>
	<div class="container py-4">
	<!--START OF CODE FOR DASHBOARD DATA-->
		<div class="p-5 mb-3 bg-light rounded-3 shadow-sm">
		  <div class="container-fluid py-3 overflow-hidden">
			<div class="row mb-2">
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px;white-space: normal;">
						<p class="display-3  font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">new issues</h6>
							<p class="mb-0 text-light">The number of new unresolved issues</p>
						</div>
						
					</a>
				</div>
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px;white-space: normal;">
						<p class="display-3  font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">pending issues</h6>
							<p class="mb-0 text-light">The number of unresolved issues</p>
						</div>
						
					</a>
				</div>
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px;white-space: normal;">
						<p class="display-3  font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">overdue issues</h6>
							<p class="mb-0 text-light">The number of overdue unresolved issues</p>
						</div>
						
					</a>
				</div>
				
			</div>
			<div class="row">
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px;white-space: normal;">
						<p class="display-3  font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">idle users</h6>
							<p class="mb-0 text-light">The number of users with no assigned tasks</p>
						</div>
					</a>
				</div>
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px;white-space: normal;">
						<p class="display-3  font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">unfinished tasks</h6>
							<p class="mb-0 text-light">The number of unresolved tasks of employees</p>
						</div>
					</a>
				</div>
				<div class="col text-light p-2">
					<a class="container btn btn-primary rounded-3 d-flex gap-3 p-4" href="login.php" role="button"
					style="margin-bottom:4px; white-space: normal;">
						<p class="display-3 font-weight-bold">12</p>
						<div class=" text-left">
							<h4 class="mb-0 text-uppercase">equipment issues</h6>
							<p class="mb-0 text-light">The number of equipment with issues</p>
						</div>
					</a>
				</div>
			</div>
		  </div>
		  </div>
		  <!--START OF CODE FOR UPDATE FIELD-->
		  <div class="my-3 p-3 bg-body rounded shadow-sm">
			<h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
			
			<!--
			!!!!!!
			WHERE YOU'LL INSERT THE FOR LOOP TO PRINT MULTIPLE UPDATES
			!!!!!!
			-->
			
			<!--
			
			NORMAL REPORT SUBMITION
			
			-->
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">Employee: Jasffer Padigdig</strong>
				  <p class="mb-2">February 2,2022 15:43</p>
				</div>
				<span class="d-block">Submitted report for task: "Leak test" of machine: "Aircon" at Room: "602".</span>
			  </div>
			</a>
			
			
			<!--
			REPORT SUBMITION WITH ISSUES/FOR REPAIR
			-->
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e70e02"/><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">Employee: Demter Renee Caubang</strong>
				  <p class="mb-2">February 4,2022 12:33</p>
				</div>
				<span class="d-block">Submitted report for task: "Gas pressure test" of machine: "Aircon" at Room: "602". For repair</span>
			  </div>
			</a>
			
			
			<!--
				ASSIGNING TASKS
			-->
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffdd00"/><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">Admin: Jan Laurene Manrique</strong>
				  <p class="mb-2">February 2,2022 15:43</p>
				</div>
				<span class="d-block">Assigned task: "Filter Replacement" to employee: "Christian Paul Duria", due on "02/02/2021"</span>
			  </div>
			</a>
			
			<!--
				KEOMS DETECTING AN ABNORMAL READING IN THE REPORT
			-->
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e70e02"/><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">KEOMS</strong>
				  <p class="mb-2">February 2,2022 15:43</p>
				</div>
				<span class="d-block">Detected abnormal reading at task: "Temperature check" on field/s: "temperature", machine: "Aircon" at room: "606"</span>
			  </div>
			</a>
			
			<!--
				RESOLVING AN ISSUE BY THE ADMIN OR BMO HEAD
			-->
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#2dc653"/><text x="50%" y="50%" fill="#007bff" dy=".3em"></text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">Head: Trisha Tolentino</strong>
				  <p class="mb-2">February 2,2022 15:43</p>
				</div>
				<span class="d-block">Resolved issue: "abnormal reading" of machine: "Aircon" at room: "801"</span>
			  </div>
			</a>
			<a class="d-flex text-muted pt-3" style="white-space: normal;" href="#">
			  <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

			  <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
				<div class="d-flex justify-content-between">
				  <strong class="text-gray-dark">Employee: Jasffer Padigdig</strong>
				  <p class="mb-2">February 2,2022 15:43</p>
				</div>
				<span class="d-block">Submitted report for task: "Leak test" of machine: "Aircon" at Room: "602".</span>
			  </div>
			</a>
			<small class="d-block text-end mt-3">
			  <a href="#">All updates</a>
			</small>
		  </div>
		</div>
</body>