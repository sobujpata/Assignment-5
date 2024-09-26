@extends("layout.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Contact Us</h3>
                    </div>
                    <div class="card-body">
                        <p>We’re here to help! If you have any questions, concerns, or need assistance, feel free to reach out to us. Our customer support team is available to assist you with your car rental needs.</p>
                           <h5>Get in Touch</h5>
                           <p>Phone: +8801739871705 <span>Available 24/7</span></p>
                           <p>Email: mdsalimrezaspi@gmail.com</p>
                           <p>Address: 123, Road 1, Dhanmondi, Dhaka </p>

                           <h5>Send Us a Message</h5>
                           <p>Have a specific inquiry or request? Use the form below to send us a message, and we’ll get back to you as soon as possible.</p>
                           <p>Contact Form:</p>
                           <form action="/send-message" method="POST">
                            <div class="form-group">
                              <label for="name">Your Name</label>
                              <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                          
                            <div class="form-group">
                              <label for="email">Your Email</label>
                              <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                          
                            <div class="form-group">
                              <label for="subject">Subject</label>
                              <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                          
                            <div class="form-group">
                              <label for="message">Message</label>
                              <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                          
                            <button type="submit" class="btn btn-primary">Send Message</button>
                          </form>
                          <h5>Visit Us</h5>
                          <p>You’re always welcome to visit us at our office during business hours. We’d love to help you in person!</p>
                          <p>Location Map:</p>
                          <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1234567890123!2d-122.4194154846789!3d37.774929279759396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064c7c9abcd!2s123+Main+Street,+Suite+400,+Cityville,+State!5e0!3m2!1sen!2sus!4v1234567890123"
                          width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                          aria-hidden="false" tabindex="0"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection