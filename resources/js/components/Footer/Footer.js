import React, {Component} from 'react'

class Footer extends Component{
    constructor(props){
        super(props)
    }
    render () {
        return(
            
            <footer>
                <section className="footer-top">
                    <div className="container">
                        <div className="row">
                        <div className="col-md-3">
                            <figure>
                            <img src="img/factslogo.png" alt="Facts Nepal" />
                            </figure>
                        </div>
                        <div className="col-md-3">
                            <h6>
                            Find Out More
                            </h6>
                            <div className="footer-links">
                            <a href="#" className="footer-links__item no-decoration "> Home</a>
                            <a href="#" className="footer-links__item no-decoration "> About</a>
                            <a href="#" className="footer-links__item no-decoration "> Services</a>
                            <a href="#" className="footer-links__item no-decoration "> Works</a>
                            <a href="#" className="footer-links__item no-decoration "> Contact</a>
                            </div>
                        </div>
                        <div className="col-md-3">
                            <div className="contat-footer">
                            <h6> Contact Us</h6>
                            <div className="contact-footer__item">
                                <i className="la la-phone"></i><span> +977 - 9878764201</span>
                            </div>
                            <div className="contact-footer__item">
                                <i className="la la-phone"></i><span> 01-12124029</span>
                            </div>
                            <div className="contact-footer__item">
                                <i className="la la-envelope"></i>
                                <span> info@factsnepal.com.np</span>
                            </div>
                            </div>
                        </div>
                        <div className="col-md-3">
                            <div className="download-btn">
                            <h6> Download Our App</h6>
                            <div className="flex linkHolder">
                                <a href="" className="no-decoration download-btn__item"> <img src="img/assets/googleplay.png" alt="google Play" /></a>
                                <a href="" className="no-decoration download-btn__item"> <img src="img/assets/appstore.png" alt="google Play" /></a>
                            </div>

                            </div>
                        </div>
                        </div>
                    </div>
                </section>
            </footer>




        )
    }
}
export default Footer;