@extends('common.layout')

@section('content')

<!-- contact section -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-5" style="max-width:500px;">
                <p class="text-uppercase">Get In Touch</p>
                <h3 class="title-style">Contact with <span>Us</span></h3>
            </div>
            <div class="mx-auto" style="max-width:1000px">
                <div class="row contact-block">
                    <div class="col-md-7 contact-right">
                        <form action="/contactwithus" method="post" class="signin-form">
                        @csrf
                            <div class="input-grids">
                                <input type="text" name="name" id="w3lName" placeholder="Your Name*"
                                    class="contact-input" required="" />
                                <input type="text" name="mobile" id="w3lName" placeholder="Your Mobile Number*"
                                    class="contact-input" required="" />
                                <input type="email" name="email" id="w3lSender" placeholder="Your Email*"
                                    class="contact-input" required="" />
                                <input type="text" name="subject" id="w3lSubect" placeholder="Subject*"
                                    class="contact-input" required="" />
                                <input type="text" name="url" id="w3lWebsite" placeholder="Website URL"
                                    class="contact-input" />
                            </div>
                            <div class="form-input">
                                <textarea name="message" id="w3lMessage" placeholder="Type your message here*"
                                    required="" required="" ></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-style" type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 contact-left pl-lg-5 mt-md-0 mt-5">
                        <h3 class="font-weight-bold mb-md-5 mb-4">Contact Details</h3>
                        <div class="cont-details">
                            <div class="d-flex contact-grid">
                                <div class="cont-left text-center mr-3">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Company Address</h6>
                                    <p>196/09, Sonadanga R/A, Khulna-9100, Bangladesh</p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Call Us</h6>
                                    <p><a href="tel:+880 1911 602 601">+880 1911 602 601, </a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p><a href="mailto:info@digitalvai.com">info@digitalvai.com</a></p>
                                </div>
                            </div>
                            <div class="d-flex contact-grid mt-4 pt-lg-2">
                                <div class="cont-left text-center mr-3">
                                    <i class="fas fa-headphones-alt"></i>
                                </div>
                                <div class="cont-right">
                                    <h6>Customer Support</h6>
                                    <p><a href="https://www.digitalvai.com">www.digitalvai.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- map -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.4707945896726!2d89.55071591446675!3d22.8220651295201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff90089b8b1e03%3A0xbba517c23ae5f684!2z4Ka24Ka_4KasIOCmrOCmvuCmoeCmvOCngCDgpq7gp4vgpqHgprwsIOCmluCngeCmsuCmqOCmvg!5e0!3m2!1sbn!2sbd!4v1640245306807!5m2!1sbn!2sbd"
            width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen=""></iframe>
    </div><br>
<!-- //contact section -->

@endsection