
@extends('layouts.guestlayout')
@section('content')
<div class="offers col-lg-12" >


    <div class="container" >
      <div class="row">


        <div class="col-lg-12">
        

          <div class="offers_grid">

            

            <div class="offers_item rating_4">
              <div class="row">
                <div class="col-lg-1 temp_col"></div>
                <div class="col-lg-3 col-1680-4">
                  <div class="offers_image_container">
                    <!-- Image by https://unsplash.com/@kensuarez -->
                    <div class="offers_image_background" style="background-image:url(images/7.jpg)"></div>
                    <div class="offer_name"><a href="">Superior</a></div>
                  </div>
                </div>
                <div class="col-lg-8">
                  
                    <div class="offers_price">₱1,232<span>per night</span></div>
                    <div class="rating_r rating_r_9 offers_rating" data-rating="9">
                    
                    
                    <div class="col-lg-7 "style="margin-top: 20px;color: black">
                      <p style="color: black">This room has air conditioning and tile/marble floor. There is a private bathroom with hot/cold shower and free amenities. Guests enjoy a seating area and a cable TV.</p>

                    </div>
                    
                    <div class="col-lg-7" style="margin-top: 20px;color: black">
                      
                        <h3><b>Room Amenities</b></h3>
                    
                      <ul>
                        
                      <li >
                        Free Wifi                     </li>

                    
                      <li >
                        Hair Dryer (on request)                     </li>

                                          </ul>
                    </div>
                    
                    <div class="offer_reviews">
                      <div class="offer_reviews_content">
                        <div class="offer_reviews_title">very good</div>
                        <div class="offer_reviews_subtitle">100 reviews</div>
                      </div>
                      <div class="offer_reviews_rating text-center">8.1</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          

          </div>
        </div>

      </div>
    </div>


  </div>
  
  

        <div class=" offers col-lg-12" >
             <div class="row col-lg-12">
           <div class="col-md-4 "    >
            <div class="card text-white" style="background: linear-gradient(to top right, #fa9e1b, #8d4fff);">
              <div class="card-header p-2 " style="text-align: center">
               <h5 ><b>Your Booking Details</b></h5>
              </div>
              <div class="card-body contact_form_container">
                



                    <div class="form-group">
                        <label>Check-in :</label> <label> Saturday, December 14, 2019</label>

                        
                    </div>

                     <div class="form-group">
                        <label>Check-out :</label>   <label> Sunday, December 15, 2019 </label> 
                        </div>

                   <div class="form-group">
                        <label>Total length of stay :</label> <label>1 night </label>
</div>

                   <div class="form-group">
                        <label>You Selected :</label>
                            <label>Superior Room </label> 
                       </div>
             
              <div class="card-header p-2 " style="text-align: center">
               <h5 ><b>Your Price Summary</b></h5>
              </div>
              <div class="card-body">
                
                  
                    <div class="form-group col-lg-12">
                      <div class="row">
                      <div class="col-lg-6">
                        <label>Room:</label>
                      </div>
                        

                        <div class="col-lg-6">
                          <h5 style="float: right">₱<span style="margin-left: 10px"></span>1,232 </h5>
                        </div>
                    </div>
                  </div>
                    

               <div class="form-group col-lg-12">
                      <div class="row">
                      <div class="col-lg-6">
                        <h5>12% VAT:</h5>
                      </div>
                        

                        <div class="col-lg-6">
                          <h5 style="float: right">₱<span style="margin-left: 10px"></span>147.84 </h5>
                        </div>

                    </div>
                  </div>
                   <div class="form-group col-lg-12">
                      <div class="row">
                      <div class="col-lg-6">
                        <h5>Total :</h5>
                      </div>
                        

                        <div class="col-lg-6">
                          <h5 style="float: right">₱<span style="margin-left: 10px"></span>1,232 </h5>
                        </div>
                        
                    </div>
                  </div>

                  <div class="form-group col-lg-12">
                      
                      <div class="col-xm-4" style="float: right">
                        <h5>for(2 guests) in 1 night</h5>
                      </div>
                        

                        
                        
                    </div>
                  
                    
                </div>             
            
                </div>
              </div>
            </div>





  <div class="col-lg-8" >
    <div class="contact_background" style="background-image:url(images/contact.png)"></div>

    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="contact_image">

          </div>
        </div>
        <div class="col-lg-7">
          <div class="contact_form_container">
            <div class="contact_title">Enter Your Details</div>
            <div id="ErrorMessage" style="background-color:red;color:#fff;" ></div> 
            <form  action=""  class="contact_form" method="post" onsubmit="return cusvalid()" > 
              <input type="text" name="fname" id="name" class="contact_form_name input_field" placeholder="Name"  >
              <input type="text" name="lname" id="last" class="contact_form_email input_field" placeholder="Last Name"  data-error="lastname is required.">
              <input type="email" name="email" class="contact_form_name input_field" placeholder="Email"  data-error="Email is required.">
              <input type="text" name="phone" class="contact_form_email input_field" placeholder="Phone Number"  data-error="Phone Number is required.">
              <input type="text" name="add" class="contact_form_name input_field" placeholder="Address"  data-error="Address is required.">

              <input type="text" name="uname" class="contact_form_name input_field" placeholder="Username"  data-error="Username is required.">
              <input type="password" name="upass" class="contact_form_email input_field" placeholder="Password"  data-error="Password is required.">


              <!--<input type="text" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Subject" required="required" data-error="Subject is required.">
              <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>-->
              <button type="button" name="cusdetail" class="form_submit_button button" >Book now<span></span><span></span><span></span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection