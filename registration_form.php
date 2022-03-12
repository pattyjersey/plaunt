<section id="content" class="registration-page" >
			<div class="container">
				<div class="row">
					<div class="col-sm-5 text-center side">
					<!-- <h1>Mama mo Plaunt!</h1> -->
						<img src="assets/images/1.png" class="img-responsive inline-block" alt="">
					</div>
					<div class="col-sm-6 side2">
						<form method="post" class="user-registration-form form-horizontal">
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-8">
									<h1 class="text-center">Sign Up</h1>
									<p>Join us and share your thoughts!</p>
								</div>
							</div>
							<div class="form-group">
								<label for="u_name" class="col-sm-2">Name:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="u_name" placeholder="Enter your name" required>
								</div>
							</div>
							<div class="form-group">
								<label for="u_pass" class="col-sm-2">Password:</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="u_pass" placeholder="Enter your password" required>
								</div>
							</div>
							<div class="form-group">
								<label for="u_email" class="col-sm-2">Email:</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="u_email" placeholder="Enter your mail" required>
								</div>
							</div>

							<div class="form-group">
								<label for="u_gender" class="col-sm-2">Gender:</label>
								<div class="col-sm-10">
									<select name="u_gender" class="form-control">
									  <option>---</option>
									  <option value="Male">Male</option>
									  <option value="Female">Female</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								<div class="tacbox">
								<input id="checkbox" type="checkbox" />
								<label for="checkbox"> I agree to these <a data-toggle="modal" data-target="#myModal">Terms and Conditions</a>.</label>
								</div>
								<div class="container">
							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Modal Header</h4>
									</div>
									<div class="modal-body">
									<p> </p>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
								</div>
							</div>
							</div>
									<button type="submit" name="sign_up" class="btn btn-default btn-success drew">Sign Up</button>
								</div>
							</div>
						</form>

						<?php include( 'user_insert.php' ); ?>

					</div>
				</div>
			</div>
		</section>