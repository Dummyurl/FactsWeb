import React, { Component } from 'react';
import { BrowserRouter as Router, Route, Link } from "react-router-dom";
import Fade from 'react-reveal/Fade';
import Bounce from 'react-reveal/Bounce';
import HeaderBar from '../../HeaderBar/HeaderBar'
import Footer from '../../Footer/Footer'


class About extends Component {
    constructor(props) {
        super(props);
        this.state = {  }
    }
    render() { 
        return (
            <div>
            <HeaderBar />
            <div>
            <section className="aboutTop ">
                <div className="">
                    <div className="aboutTop__wrapper">
                        <div className="aboutTop__left d-flex justify-content-center flex-column">
                            <h3>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</h3>
                            <h3 className="dark">Lorem ipsum dolor sit amet,
consetetur </h3>

                        </div>
                        <div className="aboutTop__right">

                        </div>


                    </div>
                    <div className="row no-gutters about-tab">
                        <div className="col-md-3 text-center active centered"> About Us </div>
                        <div className="col-md-3 text-center centered"> Our Mission </div>
                        <div className="col-md-3 text-center centered"> Our Board  </div>
                        <div className="col-md-3 text-center centered"> Contact Us</div>

                    </div>
                </div>
            </section>

            <section className="aboutus section-padding bggrey">
                <div className="container-fluid custom-container">
                    <div className="inner-contanier">
                        <h3 className="text-center">About Us</h3>
                        <p className="text-center siventy-center">A lack of proper and timely availability of data in Nepal has always remained a great challenge for all who believe in the power of accurate and contextual data for informed decision-making. In the past, a lot of data in Nepal was considered unattainable </p>

                    </div>
                    <div className="aboutus__firstElement">
                        <div className="row no-gutters">
                            <div className="col-md-5">
                                <div className="img-wpr">
                                    <img src="img/office.png" alt="search" />

                                </div>


                            </div>
                            <div className="col-md-7 about-left">
                                <div className="aboutus__firstleft">
                                    <h4 className="primary-color medium"> 2012</h4>
                                    <h4 >Started a company without any idea about how to began </h4>
                                    <p>Started a company with 12 members and  starting on the research of the company and done this and thaadsasdasdasdasd asdasdasd asdasd das ads asd ads asd ads ads  as asd ads asdasd asd asd  asdasd=-0werqfjqsa-9qwe ase098qweifjqewifj asd asda ds</p>
                                    <p>Started a company with 12 members and  starting on the research of the company and done this and thaadsasdasdasdasd asdasdasd asdasd das ads asd ads asd ads ads  as asd ads asdasd asd asd  asdasd=-0werqfjqsa-9qwe ase098qweifjqewifj asd asda ds</p>

                                </div>

                            </div>

                        </div>
                        <div className="row aboutus__rest mt-2f">
                            <div className="col-md-4">
                                <div className="aboutus__imgholder img-wpr relative ">
                                    <div className="darkoverlay overlay"></div>
                                    <img src="img/people.png" alt="people" />
                                    <div className="aboutus__rest-bottom absolute">
                                        <h3> 2015</h3>
                                        <p className="aboutus__para">Starting to work with local peoples and started working with helping them </p>
                                    </div>

                                </div>
                            </div>
                            <div className="col-md-4">
                                <div className="aboutus__imgholder img-wpr relative ">
                                    <div className="darkoverlay overlay"></div>
                                    <img src="img/team.png" alt="team" />
                                    <div className="aboutus__rest-bottom absolute">
                                        <h3> Our Team</h3>
                                        <p className="aboutus__para">Starting to work with local peoples and started working with helping them </p>
                                    </div>

                                </div>
                            </div>
                            <div className="col-md-4 aboutLast">
                                <div className="aboutus__imgholder img-wpr relative ">
                                    <div className="aboutus__vision text-center">
                                        <h3 className="primary-color"> Vision</h3>
                                        <p className="aboutus__para">Starting to work with local peoples and started working with helping them </p>
                                    </div>

                                    <img src="img/book.png" alt="people" />


                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </section>
            <section className="leadership  section-padding">
                <div className="container-fluid custom-container">
                    <div className="inner-contanier">
                        <div className="inner-contanier">
                            <h3 className=" text-center "><span className="primary-color"> Leadership </span> and management team</h3>
                            <p className="siventy-center text-center">Started a company with 12 members and  starting on the research of the company and done this and thaadsasdasdasdasd asdasdasd asdasd das ads asd ads asd ads ads  as asd ads asdasd asd asd  asdasd=-0werqfjqsa-9qwe ase098qweifjqewifj asd asda ds</p>
                        </div>

                    </div>


                    <div className="row">
                        <div className="col-md-4">
                            <div className="leadership__items relative">
                                <div className="overlay centered columnf overlay light-overlay hover-overlay ">
                                    <h4> Name of person</h4>
                                    <p > Position</p>
                                </div>
                                <div className="img-wpr"> <img src="img/m2.png" /></div>


                            </div>
                        </div>
                        <div className="col-md-4">
                            <div className="leadership__items relative">
                                <div className="overlay centered columnf overlay light-overlay hover-overlay ">
                                    <h4> Name of person</h4>
                                    <p > Position</p>
                                </div>
                                <div className="img-wpr"> <img src="img/m3.png" /></div>


                            </div>
                        </div>
                        <div className="col-md-4">
                            <div className="leadership__items relative">
                                <div className="overlay centered columnf overlay light-overlay hover-overlay ">
                                    <h4> Name of person</h4>
                                    <p > Position</p>
                                </div>
                                <div className="img-wpr"> <img src="img/m1.png" /></div>


                            </div>
                        </div>
                    </div>


                </div>



            </section>
            <section className="mission  section-padding bggrey">
                <div className="container-fluid custom-container">
                    <div className="inner-container">
                        <h3 className="text-center primary-color">Our Mission</h3>
                        <p className="siventy-center text-center">A lack of proper and timely availability of data in Nepal has always remained a great challenge for </p>
                    </div>
                    <div className="row justify-content-center align-items-center mission__row">
                        <div className="col-md-4">
                            <div className="mission__dateHolder text-center">
                                2020
                        </div>

                            <p className="text-center">Increase the data information to all of the people around the local levels</p>


                        </div>
                        <div className="col-md-4">
                            <div className="mission__dateHolder text-center">
                                <img src="img/rocket.png" alt="mission" />

                            </div>


                        </div>

                        <div className="col-md-4">
                            <div className="mission__dateHolder text-center">
                                2030
                        </div>

                            <p className="text-center">Increase the data information to all of the people around the local levels</p>


                        </div>
                    </div>
                </div>
            </section>

            <section className="contactusabt  section-padding ">
                <div className="container-fluid custom-container">
                    <div className="help">
                        <span className="contactusabt__largfont"> We are always there to help you feel free to contact us</span>
                        <button className=" btn btn-primary btn-lg heroleft__btn btnct" > <span className="fom"> Contact Us</span><i className="la la-arrow-right"></i></button>

                    </div>


                </div>


            </section>

        </div>);
            <Footer />
            </div>
            );
    }
}
 
export default About;