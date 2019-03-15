// import axios from 'axios'
import React, { Component } from 'react'
// import './services.scss';
class NewProject extends Component {
  constructor (props) {
    super(props)

    this.state = {
      
    }

    
  }

  render () {
    return(
        <section className="services ">
        <div className="container">
          <div className="row">
            <div className="col-md-3">
              <div className="left-title section-padding-y">
                <h3 className="text-white overprimary mt-5 outservices">Our Services</h3>
                <p className="text-white overprimary mt-3">several of them er asked how
                  satisfied they are with our services.
                  here are their statement
                </p>
              </div>
            </div>
            <div className="col-md-9">
              <div className="row">
                <div className="col-md-4">
                  <div className="service-item text-center section-padding-y">
                    <div className="service-item__iconholder imp-wpr ">
                      <img src="img/assets/report.png" alt=" reasearch" />
                    </div>
                    <div className="service-item__title mt-2 mb-2 text-white overprimary">
                      <div> Customized research</div>
                      <div>and Data Analysis</div>
                    </div>
                    <a className="service-item__link no-decoration text-white overprimary" href="#"> <span> Read More</span> <i
                        className="la la-arrow-right"></i> </a>
                  </div>
                </div>
                <div className="col-md-4">
                  <div className="service-item text-center section-padding-y">
                    <div className="service-item__iconholder imp-wpr ">
                      <img src="img/assets/strategy.png" alt=" reasearch" />
                    </div>
                    <div className="service-item__title  mt-2 mb-2 text-white overprimary">
                      <div> Strategy and</div>
                      <div> Content Development</div>
                    </div>
                    <a className="service-item__link no-decoration text-white overprimary" href="#"> <span> Read More</span> <i
                        className="la la-arrow-right"></i> </a>
                  </div>
                </div>
                <div className="col-md-4">
                  <div className="service-item text-center section-padding-y">
                    <div className="service-item__iconholder imp-wpr ">
                      <img src="img/assets/report.png" alt=" reasearch" />
                    </div>
                    <div className="service-item__title  mt-2 mb-2 text-white overprimary">
                      <div>Infographics</div>
                      <div>& Design</div>
                    </div>
                    <a className="service-item__link no-decoration text-white overprimary" href="#"> <span> Read More</span> <i
                        className="la la-arrow-right"></i> </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    )
  }
}

export default NewProject
