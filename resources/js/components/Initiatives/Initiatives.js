import React,{ Component } from 'react';

class Initiatives extends Component {
    constructor(props){
        super(props)
        this.state={
            initiatives:[]
        }
    }
    componentDidMount () {
        axios.get(`/inititivesapi`).then(response => {
          this.setState({
            initiatives: response.data
          })
          console.log(this.state.initiatives);
        })

      }
      
    render () {
        const { initiatives } = this.state
        return(
            <section className="section-padding-y initiatives">
                {initiatives.map((item,i)=>
                    // item.ourinititives.map((company, i) =>
                <div className="container">
                    <div className="row">
                        <div className="col-md-3">
                            <div className="left-title">
                                <h3>Our Initiatives</h3>
                                <p>several of them er asked how
                                satisfied they are with our services.
                                here are their statement
                                </p>
                            </div>
                        </div>
                        <div className="col-md-9">
                            <div className="row   five">
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {/* Contest */}
                                        {item.ourinititives[0].title}
                                        </h6>
                                        <div className="ii__img">
                                        <img src={item.ourinititives[0].image} alt="trophy" />
                                        </div>
                                        <p className="ii__description mb-3">
                                        {item.ourinititives[0].shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {item.ourinititives[1].title}
                                        </h6>
                                        <div className="ii__img"> <img src={item.ourinititives[1].image} alt="Public" /></div>
                                        <p className="ii__description mb-3">{item.ourinititives[1].shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {item.ourinititives[2].title}
                                        </h6>
                                        <div className="ii__img"> <img src={item.ourinititives[2].image} alt="knowledge" /></div>
                                        <p className="ii__description mb-3">{item.ourinititives[2].shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {item.ourinititives[3].title}
                                        </h6>
                                        <div className="ii__img"><img src={item.ourinititives[3].image} alt="contest" /></div>
                                        <p className="ii__description mb-3">{item.ourinititives[3].shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                                <div className=" col-md-6 col-lg-4">
                                    <div className="ii">
                                        <h6 className="mb-3">
                                        {item.ourinititives[4].title}
                                        </h6>
                                        <div className="ii__img"><img src={item.ourinititives[4].image} alt="poll"/></div>
                                        <p className="ii__description mb-3">{item.ourinititives[4].shortdesc}
                                        </p>
                                        <a href="#" className="no-decoration"> <span>Read More</span> <span><i className="la la-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        
                    </div>
                </div>
                )}
            </section>
        )
    }
}
export default Initiatives;