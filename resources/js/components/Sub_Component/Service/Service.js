import React, { Component } from 'react';
import HeaderBar from '../../HeaderBar/HeaderBar'
import Footer from '../../Footer/Footer'
import Fade from 'react-reveal/Fade';

class Service extends Component {
    constructor(props) {
        super(props);
        this.state = {  }
    }
    render() { 
        return (
            <div>
            <HeaderBar />
            <section className="service-top section-padding">
                <div className="container">
                    <div className="">
                        <div className="row align-items-center">
                        <Fade bottom duration={1000} distance={"20px"} delay={500}>
                            <div className="col-md-7">
                                <h2 className="white ">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                                <p className="white big overtext">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,. </p>
                                <button className="btn btn-primary btn-lg heroleft__btn revert  mt30"> <span className="fom"> Find Out More</span><i className="la la-arrow-right"></i></button>
                            </div>
                            </Fade>
                            <Fade bottom duration={1000} distance={"20px"}>
                            <div className="col-md-5 text-center hidesm">
                                <img src="img/services.png" alt="services" />
                            </div>
                            </Fade>

                        </div>


                    </div>
                </div>
            </section>
            <section className="service-list">
                <div className="container">
    
                    <div className="row section-padding">
                    <Fade bottom duration={1000} distance={"20px"} delay={1000} >
                        <div className="col-md-4 o1">
                            <div className="service-list__imgholder text-center">
                                <img src="/img/strategy.png" />
                            </div>
                        </div>
                        </Fade>
                        <Fade bottom duration={1000} distance={"20px"} delay={1500}>
                        <div className="col-md-8 pl150 o2">
                            <h3>Strategy and content development </h3>
                            <p>  We also help our clients develop evidence-based marketing, communications and management strategies, and make strategic decisions that help in improving their overall business efficiency. </p>
                            <p>We have a team of in-house experts and experienced consultants who specialise in strategy and content development based on our clients' needs.
</p>
                            <p>
                                We offer the Strategy and Content Development services in the following areas:</p>
                            <ul>
                                <li>Business, Brand & Communication</li>
                                <li>Mass Media & Public Relations</li>
                                <li>Digital & Social Media</li>
                              </ul>

                        </div>
                        </Fade>


                    </div>
                    <div className="row section-padding">
                    <Fade bottom duration={1000} distance={"20px"} delay={1000} >
                    <div className="col-md-8 pr150 o2">
                            <h3>Customized Research and Data Analysis</h3>
                            <p> With a careful combination of quantitative and qualitative tools, we provide our clients the customised research services that are tailor-made for their requirements. Using structured and semi-structured questionnaires, in-depth interviews, focus group discussions, key informant interviews, observations, and GIS mapping among a number of others, we collect reliable and contextual data that generate powerful insights.
 </p>
                            <p>Some of the services that we provide are as follows:</p>
                            <ul>
                             <li> Quantitative Research</li>
                             <li>Data Collection (Quantitative & Qualitative)</li>
                             <li>Market/Product Feasibility Studies</li>
                             <li>Media Research & Monitoring</li>
                             <li>Brand/Product Campaign Pre-testing</li>
                             <li>Brand Perception Studies</li>
                             <li>Evaluation Studies (baseline, midline, end-line)</li>
                             <li>Pre/Post Event Analysis</li>
                             <li>Product/Service Ratings</li>
                             <li>GIS Mapping</li>
                           </ul>





                        </div>
                        </Fade>
                        <Fade bottom duration={1000} distance={"20px"} delay={500} >
                        <div className="col-md-4 o1">
                            <div className="service-list__imgholder text-center">
                                <img src="img/ser.png" />
                            </div>
                        </div>
                        </Fade>
                        


                    </div>

                    <div className="row section-padding">
                    <Fade bottom duration={1000} distance={"20px"} >
                        <div className="col-md-4 o1 ">
                            <div className="service-list__imgholder text-center">
                                <img src="img/visualisation.png" />
                            </div>
                        </div>
                        </Fade>
                        <Fade bottom duration={1000} distance={"20px"} delay={500}>
                        <div className="col-md-8 pl150 o2">
                            <h3>Infographics Design
 </h3>
                            <p> Data in its raw form is, in most cases, complex, vast and highly intricate. Quantitative data is usually served by numeric values on tables and charts, whereas qualitative findings tend to delve deeper and frequently encompasses textual information. But the biggest problem about data is its presentation and communication with an audience. The sheer complexity and limited ways of presentation makes the communication of data rather challenging. This is where FACTS' expertise comes in. </p>
                            <p>Our team of researchers and designers are not only familiar with data presentation, but they have a vast experience in the same. We have been publishing data in the form of visual representations, better known as infographics, to present data in a form that is simple and easy to understand by the masses. We take data from our clients, pick out the important portions, ‘the juice,’ and design simple, contextual and impactful infographics, for the general public as well as specific target audience of the client. Please refer to Our Initiatives section to learn more about our work on data visualization and infographics.</p>
                            <p>
                                We offer the Strategy and Content Development services in the following areas:
     
     <br/>Business, Brand & Communication
     
     <br/> Mass Media & Public Relations
     
     <br/>Digital & Social Media
                           </p>

                        </div>
                        </Fade>
                    </div>
                </div>
            </section>
            <Footer />
            </div>
            
            );
    }
}
 
export default Service;