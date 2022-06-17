<?php 
include('../../connect.php');
include('../gen_includes/header.php');
include('../gen_includes/top_bar_admin.php');
include('../gen_includes/side_bar_admin.php');

?>






<!-- Page wrapper  -->
<div class="page-wrapper" style="background-color: #1B1D21;">
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb  -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-12 col-lg-12 align-self-center dash">
        <div class="dashTxt">
          <h3 class="text-themecolor">Dashboard</h3>
        </div>
        <div class="dashHome">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" style="display: flex; align-items:center;"><a href="../user/index.php">Home</a></li>
            <li class="breadcrumb-item active" style="display: flex; align-items:center;">Account Settings</li>
          </ol>
        </div>
      </div>
    </div>
      
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <div class="row">
      <?php include('../gen_includes/message/status_msg.php'); ?>
    </div>

    <div class="container pt-20 mb-10" style="background-color: #111111;">
      <h2>Edit Wallet</h2>
      <div class="row">
        <!-- Column -->
        <div class="col-lg-5 col-xlg-3 col-md-11 col-sm-12">
          <div class="card" style="border-radius: 15px;">
            <div class="mb-10" style="background-color: #C1771F; padding: 20px; border-radius: 15px 15px 0px 0px;">
              <h6 style="font-size: 20px;">Choose the wallet you wish to Edit</h6>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab pa-10" role="tablist">
              <li class="nav-item mr-60 mb-20">
                <a class="nav-link active" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#btc" role="tab">Btc</a>
              </li>
              <li class="nav-item ml-60 mb-20">
                <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#eth" role="tab">Eth</a>
              </li>
              <li class="nav-item mr-60 mb-10">
                <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#usdt" role="tab">Usdt</a>
              </li>
              <li class="nav-item ml-60 mb-10">
                <a class="nav-link" style="width: 100px; text-align: center; border-radius: 10px;" data-bs-toggle="tab" href="#busd" role="tab">Busd</a>
              </li>
            </ul>

          </div>

        </div>

        <!-- Column -->
        <div class="col-lg-6 col-xlg-9 col-md-11 col-sm-12">
          <div class="card" style="border-radius: 15px;">
          

            <!-- Tab panes -->
            <div class="tab-content pa-20">
              <div class="tab-pane active" id="btc" role="tabpanel">
                <form action="../../connect.php" method="POST">
                  <h3 class="mb-30">Enter your BTC wallet address</h3>
                  <h4>BTC Wallet address <span class="text-danger">*</span></h4>
                  <div class="form-group mb-30" style="width: 100%;">
                    <?php
                      $query = "SELECT * FROM admin_btc_wallet";
                      $result = mysqli_query($con, $query);
                      if (mysqli_num_rows($result)) {
                        foreach ($result as $row) {

                        }
                        $admin_btc_wallet_address = $row['admin_btc_wallet_address'];
                      }
                    ?>
                    <input type="text" name="admin_btc_wallet_address" class="form-control" value="<?php echo $admin_btc_wallet_address ?>" style="background-color: #1d1d1d; border-radius: 10px;">
                  </div>
                  <div style="width: 100%;" class="mb-40">
                    <button class="btn btn-info" type="submit" name="add_admin_btc_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update BTC wallet</button>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="eth" role="tabpanel">
                <form action="../../connect.php" method="POST">
                  <h3 class="mb-30">Enter your ETH wallet address</h3>
                  <h4>ETH Wallet address <span class="text-danger">*</span></h4>
                  <div class="form-group mb-30" style="width: 100%;">
                      
                    <?php
                      $query = "SELECT * FROM admin_eth_wallet";
                      $result = mysqli_query($con, $query);
                      if (mysqli_num_rows($result)) {
                        foreach ($result as $row) {

                        }
                        $admin_eth_wallet_address = $row['admin_eth_wallet_address'];
                      }
                    ?>
                    <input type="text" name="admin_eth_wallet_address" class="form-control" value="<?php echo $admin_eth_wallet_address ?>"  style="background-color: #1d1d1d; border-radius: 10px;">
                  </div>
                  <div style="width: 100%;" class="mb-40">
                    <button class="btn btn-info" type="submit" name="add_admin_eth_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update ETH wallet</button>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="usdt" role="tabpanel">
                <form action="../../connect.php" method="POST">
                  <h3 class="mb-30">Enter your USDT wallet address</h3>
                  <h4>USDT Wallet address <span class="text-danger">*</span></h4>
                  <div class="form-group mb-30" style="width: 100%;">
                    <?php
                      $query = "SELECT * FROM admin_usdt_wallet";
                      $result = mysqli_query($con, $query);
                      if (mysqli_num_rows($result)) {
                        foreach ($result as $row) {

                        }
                        $admin_usdt_wallet_address = $row['admin_usdt_wallet_address'];
                      }
                    ?>
                    <input type="text" name="admin_usdt_wallet_address" class="form-control" value="<?php echo $admin_usdt_wallet_address ?>" style="background-color: #1d1d1d; border-radius: 10px;">
                  </div>
                  <div style="width: 100%;" class="mb-40">
                    <button class="btn btn-info" type="submit" name="add_admin_usdt_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update USDT wallet</button>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="busd" role="tabpanel">
                <form action="../../connect.php" method="POST">
                  <h3 class="mb-30">Enter your BUSD wallet address</h3>
                  <h4>BUSD Wallet address <span class="text-danger">*</span></h4>
                  <div class="form-group mb-30" style="width: 100%;">
                    <?php
                      $query = "SELECT * FROM admin_busd_wallet";
                      $result = mysqli_query($con, $query);
                      if (mysqli_num_rows($result)) {
                        foreach ($result as $row) {

                        }
                        $admin_busd_wallet_address = $row['admin_busd_wallet_address'];
                      }
                    ?>
                    <input type="text" name="admin_busd_wallet_address" class="form-control" value="<?php echo $admin_busd_wallet_address ?>" style="background-color: #1d1d1d; border-radius: 10px;">
                  </div>
                  <div style="width: 100%;" class="mb-40">
                    <button class="btn btn-info" type="submit" name="add_admin_busd_wallet" style="width: 100%; border-radius: 10px; font-size: 18px">Update BUSD wallet</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- Column -->

      </div>
    </div>

    <div class="container pa-20 mt-20" style="background-color: #111111;">
      <h2>Edit Profile</h2>
      <div class="col-lg-10 col-xlg-10 col-md-10">
        <div class="card">
          <!-- Nav tabs  -->
          <div class="nav nav-tabs profile-tab"  role="tablist" >
            <li class="nav-item" style="background-color: #121417; color: #E78A1A; padding: 20px; font-size: 20px;"> Update account </li>
          </div>
          <!-- card bordy -->
          <div class="pa-20">
            <div class="card-body">
              <form class="form-horizontal form-material" action="../../connect.php" method="POST" enctype="multipart/form-data">

                <?php
                  if (isset($_SESSION['user'])) {
                    $userid = $_SESSION['user']['userid'];
                    $query = "SELECT * FROM users WHERE userid = '$userid' LIMIT 1";

                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                      foreach($result as $row) {
                        ?>

                        <input type="hidden" name="userid" value="<?php echo $row['userid'] ?>">

                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                              <input type="text" value="<?php echo $row['name'] ?>" class="form-control form-control-line"  name="name">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-12">Userame</label>
                            <div class="col-md-12">
                              <input type="text" value="<?php echo $row['username'] ?>" class="form-control form-control-line"  name="username">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                              <input type="email" value="<?php echo $row['email'] ?>" class="form-control form-control-line" name="email" >
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                              <input type="text" value="<?php echo $row['phone'] ?>" class="form-control form-control-line" name="phone">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                              <input type="password" value="<?php echo $row['password'] ?>" class="form-control form-control-line" name="password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                              <input type="password" value="<?php echo $row['cpassword'] ?>" class="form-control form-control-line" name="cpassword">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-12">Upload Profile pics</label>
                            <div class="col-md-12">
                              <input type="file" class="form-control form-control-line" name="profile_pics">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-12">Address</label>
                            <div class="col-md-12">
                              <input type="text" value="<?php echo $row['address'] ?>" class="form-control form-control-line" name="address">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="col-md-12">Country</label>
                            <div class="col-md-12">
                              <select class="form-control" name="country" style="background-color: #24282F;">
                                <option class="selectCountry"><?php echo $row['country'] ?></option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-success" name="update_profile">Update Profile</button>
                            </div>
                          </div>

                        <?php
                      }
                    }
                  }

                  else {
                    echo "<h4>No record found.!!!</h4>";
                  }
                  
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>






    <?php include('../gen_includes/footer_script.php'); ?>

<?php include('../gen_includes/footer.php'); ?>