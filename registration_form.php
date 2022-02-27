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
								<label for="u_birthday" class="col-sm-2">Birthday:</label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="u_birthday" placeholder="mm/dd/yyyy" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" name="sign_up" class="btn btn-default btn-success drew">Sign Up</button>
								</div>
							</div>
						</form>

						<?php include( 'user_insert.php' ); ?>

					</div>
				</div>
			</div>
		</section>