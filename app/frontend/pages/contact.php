
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">CONTACT INFORMATION</h2>
				</div>
			</div>

			<div class="row justify-content-center">
								<div class="col-md-12">
									<div class="wrapper">
										<div class="row mb-5">
										<?php
                        $host = "localhost";
                        $user = "root";
                        $pw = "";
                        $database = "laptop_business";
                        $conn = mysqli_connect($host,$user,$pw,$database);
                        if (!$conn) {
                            die('Could not connect: ' . mysqli_error($conn));
                        }
						$sql = "SELECT * FROM contact_page 
						WHERE create_date = (SELECT MAX(create_date) FROM contact_page)
						";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "
											<div class='col-md-3'>
												<div class='dbox w-100 text-center'>
													<div class='icon d-flex align-items-center justify-content-center' style='background-color: #28A745;'>
														<span class='fa fa-map-marker'></span>
													</div>
													<div class='text'>
														<p><span>Address: </span>".$row['address']."</p>
													</div>
												</div>
											</div>
											<div class='col-md-3'>
												<div class='dbox w-100 text-center'>
													<div class='icon d-flex align-items-center justify-content-center' style='background-color: #28A745;'>
														<span class='fa fa-phone'></span>
													</div>
													<div class='text'>
														<p><span>Phone:</span> <a href='#'>".$row['phone']."</a></p>
													</div>
												</div>
											</div>
											<div class='col-md-3'>
												<div class='dbox w-100 text-center'>
													<div class='icon d-flex align-items-center justify-content-center' style='background-color: #28A745;'>
														<span class='fa fa-paper-plane'></span>
													</div>
													<div class='text'>
														<p><span>Email:</span> <a href='#'>".$row['email']."</a></p>
													</div>
												</div>
											</div>
											<div class='col-md-3'>
												<div class='dbox w-100 text-center'>
													<div class='icon d-flex align-items-center justify-content-center' style='background-color: #28A745;'>
														<span class='fa fa-globe'></span>
													</div>
													<div class='text'>
														<p><span>Website</span> <a href='#'>".$row['website']."</a></p>
													</div>
												</div>
											</div>";
							}
						}
						mysqli_close($conn);
						?>
										</div>
										<div class="row no-gutters">
											<div class="col-md-7" id="message">
												<div class="contact-wrap w-100 p-md-5 p-4">
													<h3 class="mb-4">Write Us</h3>
													<div id="form-message-warning" class="mb-4"></div>
													<div id="form-message-success" class="mb-4">
														Your message was sent, thank you!
													</div>
													<form>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label class="label" for="name">Full Name</label>
																	<input type="text" class="form-control" name="name" id="name" placeholder="Name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label class="label" for="email">Email Address</label>
																	<input type="email" class="form-control" name="email" id="email" placeholder="Email">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label class="label" for="subject">Subject</label>
																	<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label class="label" for="#">Message</label>
																	<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input type="submit" value="Send Message" class="btn btn-primary" id="sendMessage">
																	<div class="submitting"></div>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="col-md-5 d-flex align-items-stretch">
											<?php
												$host = "localhost";
												$user = "root";
												$pw = "";
												$database = "laptop_business";
												$conn = mysqli_connect($host,$user,$pw,$database);
												if (!$conn) {
													die('Could not connect: ' . mysqli_error($conn));
												}
												$sql = "SELECT * FROM contact_page 
												WHERE create_date = (SELECT MAX(create_date) FROM contact_page)
												";
												$result = mysqli_query($conn, $sql);
												if(mysqli_num_rows($result) > 0){
													while ($row = mysqli_fetch_assoc($result)){
														echo "
												<div class='info-wrap w-100 p-5 img' style='background-image: url(".$row['image'].");'>
												</div>
											</div>";
													}
												}
											?>
											</div>
									</div>
								</div>
					
			</div>
		</div>
	</section>

